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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function post()
    {  
        $post_category=Post_Category::paginate(5);
        return view('admin.post.category.getList',['post_category'=>$post_category]);
    
    }


    public function getAdd()
    {
        return view('admin.post.category.getAdd');
    }


    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'value' => 'required|max:255|unique:post_categories',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.getPostCategoryTable-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $post_category= new Post_Category;
        $post_category->value = $request->value;
        $post_category->description = $request->description;
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

            'value' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.getPostCategoryTable-getEdit',['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $post_category =Post_Category::find($request->id);
        $post_category->value = $request->value;
        $post_category->description = $request->description;
        $post_category->save();
        return redirect()->route('admin.getPostCategoryTable-post');

    }

    public function del($id)
    {
        $post_category= Post_Category::find($id);
        $post_category->delete();        
        return redirect()->route('admin.getPostCategoryTable-post');
    }
}
