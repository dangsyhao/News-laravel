<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Category extends Model
{
    protected $table='post_categories';

    //
    public function PostListTable()
    {
        return $this->hasMany('App\PostList', 'post_category_id');
    }

}
