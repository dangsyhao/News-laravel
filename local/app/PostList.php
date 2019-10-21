<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostList extends Model
{

    public function postCategory()
    {
        return $this->belongsTo('App\Post_Category','post_category_id');
    }

    public function authorList()
    {
        return $this->belongsTo('App\User','author_id');
    }

}
