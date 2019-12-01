<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User_category;
use Validator;

class userRoleController extends Controller
{
    public function __construct()
    {
        //
    }

    public function getList()
    {  
        $author_category=User_category::paginate(10);
        return view('admin.user.role.getList',['author_category'=>$author_category]);
    }

    public function getAdd()
    {
        return view('admin.user.role.getAdd');
    }

    public function setAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_role' => 'required|max:255|unique:users_categories',
            'user_desc' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user.role.getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $User_category= new User_category;
        $User_category->user_role = str_slug($request->user_role);
        $User_category->user_desc = $request->user_desc;
        $User_category->save();

        return redirect()->route('admin.user.role.getList');
    }

    public function getEdit($id)
    {
        $User_category=User_category::where('id',$id)->get();
       return view('admin.user.role.getEdit',['User_category'=>$User_category]);
    }


    public function setEdit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_role' => 'required|max:255',
            'user_desc' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.authorCategory-getEdit',['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $User_category =User_category::find($request->id);
        $User_category->user_role = str_slug($request->user_role);
        $User_category->user_desc = $request->user_desc;
        $User_category->save();
        return redirect()->route('admin.user.role.getList');

    }

    public function setDelete($id)
    {
        $User_category= User_category::with('UserTable')->find($id);
        if( ! empty($User_category) && count($User_category->UserTable->pluck('id')) === 0){
            $User_category->delete();
        }
        return redirect()->back();
    }
}
