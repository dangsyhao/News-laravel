<?php

namespace App\Http\Controllers\admin\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Validator;
use App\Admin;
use App\Date;
class adminListController extends Controller
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
    public function list()
    {  
        $admin_list=Admin::paginate(3);
        
    return view('admin.admin.list.adminlist',['admin_list'=>$admin_list]);
    
    }


    public function getAdd()
    {
        return view('admin.admin.list.adminAdd');
    }


    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'value' => 'required|max:255|unique:admins',
            'description' => 'required|max:255',
            'level' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.admin-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $Admin = new Admin;
        $Admin->name = $request->name;
        $Admin->email = $request->email;
        $Admin->value = $request->value;
        $Admin->description = $request->description;
        $Admin->level = $request->level;
        $Admin->password = bcrypt($request->password);
        $Admin->save();

        return redirect()->route('admin.admin-list');

    }

    public function getEdit($id)
    {
        $admin_edit=Admin::where('id',$id)->get();
        return view('admin.admin.list.adminEdit',['admin_edit'=>$admin_edit]);
    }

    public function edit(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'value' => 'required|max:255',
            'description' => 'required|max:255',
            'level' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.admin-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $Admin =Admin::find($request->id);

        $Admin->name = $request->name;
        $Admin->email = $request->email;
        $Admin->value = $request->value;
        $Admin->description = $request->description;
        $Admin->level = $request->level;
        $Admin->password = bcrypt($request->password);

        $Admin->save();
        return redirect()->route('admin.admin-list');

    }

    public function del($id)
    {
        $Admin= Admin::find($id);
        $Admin->delete();        
        return redirect()->route('admin.admin-list');
    }



}
