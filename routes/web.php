<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// use App\Image;

Route::get('/', function () {

/*
    $images = Image::all();

    foreach($images as $image){
      echo "Ruta de la imagen: ".$image->image_path. "<br>";
      echo "Descripcion de la imagen: ".$image->description."<br>";
      echo "Quien subió la foto: ". $image->user->name. " ". $image->user->surname."<br>";
    
      //    Para sacar cosas de los comments de la foto
      if(count($image->comments) >= 1){
      echo "Comentarios(".count($image->comments).") :"."<br>";
        foreach($image->comments as $comment){
            echo " => Comentario de la foto: ". $comment->content."<br>";
            echo "Quien hizo el comentario: ".$comment->user->name."<br>";
        }
      }
      if(count($image->likes) >= 1){
        echo "<br>"."Likes(".count($image->likes).") ";
        foreach($image->likes as $like){
          echo "| A ". $like->user->name. " ". $like->user->surname. " le gusta esta foto ";
        }
        echo "<br>";
       
    }
    echo "<hr>";
  }
    die();
*/
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home'); // cambiado (previo: get('/home') )

Route::get('/config','UserController@config')->name('config');
Route::post('/user/update', 'UserController@Update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');

/* Crear imagenes button */
Route::get('/image/create', 'ImageController@create')->name('image.create');
Route::post('/image/save', 'ImageController@save')->name('image.save');

/* Home */
Route::get('/image/file/{filename}', 'ImageController@getImage')->name('image.file');

/* Image Detail */
Route::get('/image/{id}', 'ImageController@detail')->name('image.detail');

/* Comments */
Route::post('comment/save', 'CommentController@save')->name('comment.save');
Route::get('comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

/* Likes */
Route::get('like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('dislike/{image_id}', 'LikeController@dislike')->name('like.delete');

Route::get('likes', 'LikeController@index')->name('like');

/* Profile */
Route::get('profile/{id}', 'UserController@profile')->name('profile');

/* Actualizar - borrar foto */
Route::get('image/delete/{id}', 'ImageController@delete')->name('image.delete');
Route::get('image/update/{id}', 'ImageController@update')->name('image.update');
Route::post('image/updated', 'ImageController@updated')->name('image.updated');

/* Buscador */
//  Route::get('people', 'UserController@index')->name('user.index');
    Route::get('people/{search?}', 'UserController@index')->name('user.index');

