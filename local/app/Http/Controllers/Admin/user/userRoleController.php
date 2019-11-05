<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Author_category;
use Validator;

class userRoleController extends Controller
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
    public function getList()
    {  
        $author_category=Author_category::paginate(5);
        
        return view('admin.user.role.getList',['author_category'=>$author_category]);
    
    }


    public function getAdd()
    {
        return view('admin.user.role.getAdd');
    }


    public function setAdd(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'value' => 'required|max:255|unique:author_categories',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.authorCategory-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $Author_category= new Author_category;
        $Author_category->value = $request->value;
        $Author_category->description = $request->description;
        $Author_category->save();
        return redirect()->route('admin.user.role.getList');
    }


    public function getEdit($id)
    {
        $authorCategory_edit=Author_category::where('id',$id)->get();
       return view('admin.user.role.getEdit',['authorCategory_edit'=>$authorCategory_edit]);
    }


    public function setEdit(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'value' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.authorCategory-getEdit',['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $Author_category =Author_category::find($request->id);
        $Author_category->value = $request->value;
        $Author_category->description = $request->description;
        $Author_category->save();
        return redirect()->route('admin.user.role.getList');

    }

    public function setDelete($id)
    {
        $Author_category= Author_category::find($id);
        $Author_category->delete();        
        return redirect()->route('admin.user.role.getList');
    }
}
