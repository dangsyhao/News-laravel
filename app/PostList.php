<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PostList extends Model
{

    public function getPostCategoryTable()
    {
        return $this->belongsTo('App\Post_Category','post_category_id');
    }

    public function getAuthorByUsersTable()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
