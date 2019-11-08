<?php

namespace App\Http\Controllers\Admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\User;
use App\Author_category;
use Illuminate\Support\Facades\DB;


class userListController extends Controller
{
    public function __construct()
    {
        //
    }

    public function getList()
    {  
        $author_list=User::paginate('10');
       return view('admin.user.list.getList',['author_list'=>$author_list]);
    
    }


    public function getAdd()
    {
        $author_value=Author_category::select('value','id')->get();
        return view('admin.user.list.getAdd',['author_value'=>$author_value]);
    }


    public function setAdd(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone_number' => 'required|max:255',
            'value' => 'required|max:255',
            'address' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
        //
        if ($validator->fails()) {
            return redirect()->route('admin.user.getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        //
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->value = $request->value;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();
        //Auto Create Directory
        Storage::disk('users')->makeDirectory($request->email,0775, true);
        Storage::disk('users')->makeDirectory($request->email.'/images',0775, true);

        return redirect()->route('admin.user.getList');
    }

    public function getEdit($id)
    {
        $getAuthorByUsersTable_edit=User::where('id',$id)->get();
        $user_role = Author_category::select('value')->get();

        return view('admin.user.list.getEdit',['getAuthorByUsersTable_edit'=>$getAuthorByUsersTable_edit,'user_role'=>$user_role]);
    }

    public function setEdit(Request $request)
    {
        $currentUserId = Auth::user()->id;
        //if $id is current user then stop delete this user
        if($currentUserId == $request->id){
            return redirect()->route('admin.user.getList');
        }
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user.getEdit',['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }

        $user =User::find($request->id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone_number = $request->phone_number;
        $user->value        = $request->value;
        $user->address      = $request->address;
        $user->save();
        return redirect()->route('admin.user.getList');

    }

     function setDelete($id)
    {
        $currentUserId = Auth::user()->id;
        //if $id is current user then stop delete this user
        if($currentUserId == $id){
            return redirect()->route('admin.user.getList');
        }
        //get $user data
        $user= User::find($id);
        //Delete file storge for user
            Storage::disk('users')->deleteDirectory($user->email.'/images');
            Storage::disk('users')->deleteDirectory($user->email);

        //delete user
        $user->delete();
        //
        return redirect()->route('admin.user.getList');
    }


}
