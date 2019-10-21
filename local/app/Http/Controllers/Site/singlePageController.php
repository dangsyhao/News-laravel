<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostList;

class singlePageController extends Controller
{
   
  /** Single Page*/ 

  public function singlePage($post_category,$post_name,$post_id){

    
    $post_list=PostList::with('authorList','postCategory')
                        ->where([
                          ['id','=',$post_id],['status','>','1'],
                          ])->get();

    // Auto +1 to Single Page
    PostList::where('id','=',$post_id)->increment('view');                   

    return view('site.singlePage',['post_list'=>$post_list]);

  }

}
