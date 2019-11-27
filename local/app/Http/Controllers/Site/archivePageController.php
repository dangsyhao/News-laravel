<?php

namespace App\Http\Controllers\site;

use App\Post_Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostList;
use mysql_xdevapi\Collection;

class archivePageController extends Controller
{
    protected $Post_cat;

    function __construct()
    {
        //
    }

    public function categoryPage(Request $request){

        if(isset($request->cat_id)){
            $cat_id = $request->cat_id;
            $Post_cat = Post_Category::find($cat_id);
            $this->Post_cat = $Post_cat;

            //PostList
            $Post_obj = new PostList;
            $Posts = $Post_obj->with('getPostCategoryTable')
                                ->where([['post_category_id','=',$cat_id],['status','>','1']])
                                ->orderBy('updated_at','desc')
                                ->paginate(10);
            //Collection
            $post_data = collect();
            if($Posts->count() > 0){
                $post_data = $post_data->put('posts_cat_index',$Posts->take(1));
                $post_data= $post_data->put('posts_cat_latest',$Posts->take(11)->slice(1));
            }

            return view('site.page-archive',['post_data'=>$post_data,'Post_cat'=>$Post_cat]);
        }

        return redirect()->back();
  }

    

}
