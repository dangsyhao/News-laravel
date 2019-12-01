<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificate extends Model
{
    //
    function UserTable(){
        return $this->belongsTo('App\User','user_id');
    }
}
