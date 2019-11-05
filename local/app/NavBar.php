<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavBar extends Model
{
    //

    public function getPostCategoryTable()
    {
        return $this->belongsTo('App\Post_Category','post_category_id');
    }
}
