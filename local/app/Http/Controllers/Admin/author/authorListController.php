<?php

namespace App\Http\Controllers\Admin\author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\User;
use App\Author_category;

class authorListController extends Controller
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
    public function author()
    {  
        $author_list=User::with('authorCategory')->paginate('2');
       return view('admin.author.list.authorList-author',['author_list'=>$author_list]);
    
    }


    public function getAdd()
    {
        $author_value=Author_category::select('value','id')->get();
        return view('admin.author.list.authorList-Add',['author_value'=>$author_value]);
    }


    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:Users',
            'phone_number' => 'required|max:255',
            'address' => 'required|max:255',
            'author_id' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.authorList-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $Author_category= new User;
        $Author_category->name = $request->name;
        $Author_category->email = $request->email;
        $Author_category->phone_number = $request->phone_number;
        $Author_category->address = $request->address;
        $Author_category->author_id = $request->author_id; 
        $Author_category->password = bcrypt($request->password);
        $Author_category->save();

        //Auto Create Directory 
        Storage::disk('local')->makeDirectory($request->email);

        return redirect()->route('admin.authorList-author');

    }


    public function getEdit($id)
    {
        $authorList_edit=User::where('id',$id)->get();
        $authorCategory=Author_category::select('id','value')->get();
        
    return view('admin.author.list.authorList-edit',['authorList_edit'=>$authorList_edit,'authorCategory'=>$authorCategory]);
    }


    public function edit(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|max:255',
            'address' => 'required|max:255',
            'author_id' => 'required|max:255',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('admin.authorList-getEdit',['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $Author_category =User::find($request->id);
        $Author_category->name = $request->name;
        $Author_category->email = $request->email;
        $Author_category->phone_number = $request->phone_number;
        $Author_category->address = $request->address;
        $Author_category->author_id = $request->author_id; 
        $Author_category->save();
        return redirect()->route('admin.authorList-author');

    }

    public function del($id)
    {
        $Author_category= User::find($id);
        $Author_category->delete();        
        return redirect()->route('admin.authorList-author');
    }


}
