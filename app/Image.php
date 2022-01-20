<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images'; // Que tabla está modificando

    //  Relación One to Many / Uno a Muchos
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id', 'desc'); 
        // >> Saca todos los registros de la base de datos, todos los objetos
        //  cuyo id de imagen corresponda
    }

    //  Relación One to Many
    public function likes(){
        return $this->hasMany('App\Like');
    }

    //  Relación Many to One / Muchos a uno
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
