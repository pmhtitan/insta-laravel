<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;       //  << Para devolver respuestas (por ejemplo con la Imagen del Storage)
use Illuminate\Support\Facades\Storage;     // << Para usar el disco que hemos creado para subir imagenes
use Illuminate\Support\Facades\File;   //   << Para usar FILE

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

                        /* public function index(Request $request){     // << LA PAGINACION NO FUNCIONA DEL TODO

                            $search = $request->input('search');

                            if(!empty($search)){
                                    $users = User::where('nick', 'LIKE', '%'.$search.'%')
                                                        ->orWhere('name', 'LIKE', '%'.$search.'%')
                                                        ->orWhere('surname', 'LIKE', '%'.$search.'%')
                                                        ->orderBy('id', 'desc')
                                                        ->paginate(8);
                                                        
                            }else{
                                    $users = User::orderBy('id', 'desc')->paginate(8);
                            }

                                return view('user.index', [
                                    'users' => $users,
                                    'search' => $search
                                ]);
                        } */
                        
                    

    public function index($search = null){

        if(!empty($search)){
            $users = User::where('nick', 'LIKE', '%'.$search.'%')
                                ->orWhere('name', 'LIKE', '%'.$search.'%')
                                ->orWhere('surname', 'LIKE', '%'.$search.'%')
                                ->orderBy('id', 'desc')
                                ->paginate(8);
                                
       }else{
            $users = User::orderBy('id', 'desc')->paginate(8);
       }

        return view('user.index', [
            'users' => $users,
            'search' => $search
        ]);
    }
   
    public function config(){

        return view('user.config');
    }

    public function update(Request $request){

        $user = Auth::user();   //   Conseguimos el objeto del usuario logeado.
        $id = Auth::user()->id; //  Cogemos el id del usuario logeado.

        //  Validamos los campos según unas reglas (array).
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',                     //  IMPORTANTE: hay que ponerlo a quemarropa. Si no salta fail.
            'nick' => 'required|string|max:255|unique:users,nick,'.$id, //    lo mismo que unique pero le decimos (excepción) que a menos que el nick sea el mismo que ese id.
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,     //  con unique:users >|> comprobamos que ese email no ha sido cogido ya.
        ]);

        //  Recoger los datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //  Asignar nuevos valores al objeto del usuario [CLARO ASI MANTIENE EL RESTO DE CAMPOS QUE VIENEN DEL OBJETO JAJA]
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // Subir imagen (avatar)
        $image_path = $request->file('image_path');
       
        if($image_path){
            //  Poner nombre único (imprime fecha + nombre del fichero original del usuario)
            $image_path_name = time().$image_path->getClientOriginalName();

            //  Guardar en la carpeta storage (storage/app/users)
            Storage::disk('users')->put($image_path_name, File::get($image_path)); //  Pimero es el nombre, y luego es el fichero

            //  Seteo el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }

        $user->update();

        return redirect()->route('config')
                            ->with(['message' => 'Usuario Actualizado correctamente']);
    
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);

        return new Response($file, 200); //    Devuelvo una respuesta en formato crudo para imprimirlo por pantalla o lo que sea
    }

    public function profile($id){
        //  Función para poder ver el perfil de cualquiera.

        //  Obtener objeto user con todo del usuario buscado (parámetro pasado)
        $user = User::find($id);

        return view('user.profile',[
            'user' => $user
        ]);
        
    }

    
}
