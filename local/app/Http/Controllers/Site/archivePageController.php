<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostList;
use mysql_xdevapi\Collection;

class archivePageController extends Controller
{

  public function categoryPage($category_name,$category_id){
    //PostList
    $Posts=PostList::with('getPostCategoryTable')
                            ->where([['post_category_id','=',$category_id],['status','>','1']])
                            ->orderBy('updated_at','desc')
                            ->paginate(10);
      //Collection
      $post_data = collect();
      if($Posts->count() > 0){
          $post_data = $post_data->put('posts_cat_index',$Posts->take(1));
          $post_data= $post_data->put('posts_cat_latest',$Posts->take(10));
      }
    return view('site.page-archive',['post_data'=>$post_data]);
  }
    

}
