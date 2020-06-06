<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //


    protected $fillable =  ['$post_id','$author','$body','$is_active','$email' ];


    public function post(){
        return $this->belongsTo('App\Post');
    }
}

