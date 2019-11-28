<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostList;

class singlePageController extends Controller
{

  public function getPost(Request $request){

      if(isset($request->post_id)){
          $post_id = $request->post_id;
          $post_data=PostList::with('getAuthorByUsersTable','getPostCategoryTable')
              ->where('status','>','1')->find($post_id);
          // Auto +1 to Single Page
          PostList::where('id','=',$post_id)->increment('view');
          //
          return view('site.single',['post_data'=>$post_data]);
      }

      return redirect()->back();
  }


}
