<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavBar extends Model
{
    //
    public function getPostCategoryTable()
    {
        return $this->belongsTo('App\Post_Category','post_cat_id');
    }
    //
    public function getMenuCategoryTable()
    {
        return $this->belongsTo('App\Menu_category','menu_cat');
    }
}
