<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id' , 'status','photo_id'
    ];
    // 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

public function role(){
    return $this->belongsTo('App\Role');
}
public function photo(){
    return $this->belongsTo('App\Photo');
}
public function posts(){
    return $this->hasMany('App\Post');
}

public function isAdmin(){

   if(  $this->role->name == "admin")
   {
       //echo "is admin ";
       return true;
   }

   else
    {
        //echo "you are not admin";
    return false;
    }

}

}
