<?php

namespace App\Http\Controllers\Admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\User;
use App\User_category;


class userListController extends Controller
{
    public function __construct()
    {
        //
    }

    public function getList()
    {  
       $author_list=User::with('User_category')->paginate('10');
       return view('admin.user.list.getList',['author_list'=>$author_list]);
    }


    public function getAdd()
    {
        $author_value=User_category::select('user_role','id')->groupBy('id')->get();
        return view('admin.user.list.getAdd',['author_value'=>$author_value]);
    }


    public function setAdd(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone_number' => 'required|max:255',
            'user_cat_id' => 'required|max:255',
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
        $user->user_cat_id = $request->user_cat_id;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();
        //Auto Create Directory
        Storage::disk('users')->makeDirectory($request->email,777, true);
        return redirect()->route('admin.user.getList');
    }

    public function getEdit($id)
    {
        $currentUserId = Auth::id();
        //if $id is current user then stop delete this user
        if($currentUserId == $id){
            return redirect()->back();
        }
        $user_cat_id = User_category::select('user_role','id')->groupBy('id')->get();
        $User = User::find($id);
        return view('admin.user.list.getEdit',['user_cat_id'=>$user_cat_id,'User'=>$User]);
    }

    public function setEdit(Request $request)
    {
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

        $user = User::find($request->id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone_number = $request->phone_number;
        $user->user_cat_id    = $request->user_cat_id;
        $user->address      = $request->address;
        $user->save();
        return redirect()->route('admin.user.getList');

    }

     function setDelete($id)
    {
        $currentUserId = Auth::id();
        //if $id is current user then stop delete this user
        if($currentUserId == $id){
            return redirect()->back();
        }
        //get $user data
        $User= User::with('PostsTable')->find($id);
        //Check Post exits ?
        if( ! empty($User) && count($User->PostsTable->pluck('id')) === 0){
            //Delete file storge for user
            Storage::disk('users')->deleteDirectory($User->email.'/images');
            Storage::disk('users')->deleteDirectory($User->email);
            //
            $User->delete();
        }
        //
        return redirect()->route('admin.user.getList');
    }


}
