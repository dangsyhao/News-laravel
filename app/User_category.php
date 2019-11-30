<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_category extends Model
{
    protected $table='users_categories';
    //
    public function UserTable()
    {
        return $this->hasMany('App\User', 'user_cat_id');
    }
}
