<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostList;

class categoryPageController extends Controller
{


   /** Category Page*/ 

  public function categoryPage($category_name,$category_id){

    //PostList
    $post_list=PostList::with('postCategory')->select(
                                                  'id',
                                                  'title',
                                                  'image_avatar',
                                                  'quotes_content',
                                                  'updated_at',
                                                  'post_category_id',
                                                  'view',
                                                  'status'
                                                  )->where([
                                                    ['post_category_id','=',$category_id],
                                                    ['status','>','1'],
                                                    ])->get();
    
    $collection=collect($post_list);

      //Collection
      $post_list_index= $collection->take(-1);
      $post_list_index->all();

      $post_list_hot_news= $collection->sortByDesc('id')->slice(1,10);
      $post_list_hot_news->all();

      $post_list_link= $collection->sortByDesc('id')->slice(1);
      $post_list_link->all();

    return view('site.categoryPage',['post_list_index'=>$post_list_index,
                                      'post_list_link'=>$post_list_link,
                                      'post_list_hot_news'=>$post_list_hot_news,
                                    ]);

  }
    

}
