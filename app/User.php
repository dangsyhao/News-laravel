<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];
    //
    protected $table='users';
    //
    public function User_category()
    {
        return $this->belongsTo('App\User_category','user_cat_id');
    }
    //
    public function PostsTable()
    {
        return $this->hasMany('App\PostList', 'user_id');
    }

}
