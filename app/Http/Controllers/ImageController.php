<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image; //   Importamos los modelos de Image.
use App\Comment;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;


class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

        return view('image.create');
    }

    public function save(Request $request){ //  Donde recibo el formulario Subir Imagen

        // Validación
        $validate = $this->validate($request, [
            'description' => 'required',
            'image_path' => 'required|image' // required|mimes:png,jpg,jpeg,gif [Tambien se podría así, pero laravel trae Image y ya estaria]
        ]);

        //  Recoger datos del formulario
        $descripcion = $request->input('description');
        $image_path = $request->file('image_path');

        //  Asignar valores al objeto
        $user = Auth::user(); 

        $image = new Image();
        $image->user_id = $user->id;
        $image->image_path = null;
        $image->description = $descripcion;

        //  Subir fichero

        if($image_path){

            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;            
        }

        $image->save();

        return redirect()->route('home')->with([
            'message' => 'La foto ha sido subida correctamente!!'
        ]);
    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);

        return new Response($file, 200); 
    }

    public function detail($id){

        $image = Image::find($id); // con el método Find si yo le paso un ID me va a sacar ese objeto

        return view('image.detail', [
            'image' => $image
        ]);
    }

    public function delete($id){
        //  Para borrar la foto hay que borrar aparte de la foto, los comentarios y los likes.
        $user = Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

        //  Solo puedo borrar cosas si soy el dueño de esas cosas
        if($user && $image && $image->user->id == $user->id){

            //  Eliminar comentarios
            if($comments && count($comments) >= 1){
                foreach($comments as $comment){
                    $comment->delete();
                }
            }
            //  Eliminar likes
            if($likes && count($likes) >= 1){
                foreach($likes as $like){
                    $like->delete();
                }
            }
            //  Eliminar ficheros asociados de imagen / Storage
            Storage::disk('images')->delete($image->image_path);

            //  Eliminar registros de la imagen (la imagen en bbdd)
            $image->delete();

            //  Mensaje y redirección
            $message = array('message' => 'Se ha borrado la imagen');
            
        }else{
            $message = array('message' => 'Hubo un error al borrar la imagen');
        }

        return redirect()->route('home')->with($message);
    }

    public function update($id){
        
        $user = Auth::user();
        $image = Image::find($id);

        if($user && $image && $image->user->id == $user->id){

            return view('image.update', [
                'image' => $image
            ]);
        }else{
            return redirect()->route('home');
        }

        
    }

    public function updated(Request $request){

         // Validación
         $validate = $this->validate($request, [
            'description' => 'required',
            'image_path' => 'image' // required|mimes:png,jpg,jpeg,gif [Tambien se podría así, pero laravel trae Image y ya estaria]
        ]);

        //  Recogemos los valores del formulario
        $image_id = $request->input('image_id');
        $description = $request->input('description');
        $image_path = $request->file('image_path');
       
         //  Buscar el objeto image en la base de datos
         $image = Image::find($image_id);

         $image->description = $description;
         
         if($image_path){   //  Si el usuario ha cambiado la foto
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
         }

        //  Update la imagen
        $image->update();

        return redirect()->route('image.detail', [
            'id' => $image_id   
        ])->with(['message' => 'Se ha actualizado la foto']);

    }
}
