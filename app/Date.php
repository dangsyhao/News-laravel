<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = [
        'values', 'description'
    ];
    //
    protected $table='dates';

}
