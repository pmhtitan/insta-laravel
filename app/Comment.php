<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//  php artisan make:model Comment (singural porq tratamos con 1 objeto de una sola cosa)
class Comment extends Model
{
    protected $table = 'comments';

    //  Relación Muchos a uno
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    //  Relación Muchos a uno
    public function image(){
        return $this->belongsTo('App\Image','image_id');
    }
}
