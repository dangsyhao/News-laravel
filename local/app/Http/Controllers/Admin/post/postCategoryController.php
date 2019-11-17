<?php

namespace App\Http\Controllers\admin\post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post_Category;
use Validator;

class postCategoryController extends Controller
{
    public function __construct()
    {
        //
    }

    public function post()
    {  
        $post_category=Post_Category::paginate(10);
        return view('admin.post.category.getList',['post_category'=>$post_category]);
    }

    public function getAdd()
    {
        return view('admin.post.category.getAdd');
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_cat_name' => 'required|max:255|unique:post_categories',
            'post_cat_desc' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.getPostCategoryTable-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        $post_category= new Post_Category;
        $post_category->post_cat_name = $request->post_cat_name;
        $post_category->post_cat_desc = $request->post_cat_desc;
        $post_category->save();

        return redirect()->route('admin.getPostCategoryTable-post');
    }

    public function getEdit($id)
    {
        $getPostCategoryTable_edit=Post_Category::where('id',$id)->get();
       return view('admin.post.category.getEdit',['getPostCategoryTable_edit'=>$getPostCategoryTable_edit]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_cat_name' => 'required|max:255',
            'post_cat_desc' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.getPostCategoryTable-getEdit',['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $post_category =Post_Category::find($request->id);

        if(! empty($post_category)){
            $post_category->post_cat_name = $request->post_cat_name;
            $post_category->post_cat_desc = $request->post_cat_desc;
            $post_category->save();
        }

        return redirect()->route('admin.getPostCategoryTable-post');
    }

    public function del($id)
    {
        $post_category= Post_Category::with('PostListTable')->find($id);
        if(! empty($post_category) && count($post_category->PostListTable->pluck('id')) === 0){
            $post_category->delete();
        }

        return redirect()->route('admin.getPostCategoryTable-post');
    }
}
