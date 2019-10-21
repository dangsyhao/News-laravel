<?php

namespace App\Http\Controllers\Admin\advertise;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Advertise;

class advertiseController extends Controller
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
    public function getAdvertise()
    {  
        $advertise_list=Advertise::paginate(12);
 
        return view('admin.advertise.advertise-getAdvertise',['advertise_list'=>$advertise_list]);
    
    }


    public function getAdd()

    {   
        $image_name = Storage::allFiles('public/', 'local');
        return view('admin.advertise.advertise-add',['image_name'=>$image_name]);
    }


    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'customer' => 'required|max:300',
            'image_url' => 'required|max:300',
            'address' => 'required|max:300',
            'link' => 'required|max:300',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.advertise-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $advertise = new Advertise;
       
        $advertise->customer = $request->customer;
        $advertise->image_url = $request->image_url;
        $advertise->address = $request->address;
        $advertise->link = $request->link; 
        $advertise->save();
        return redirect()->route('admin.advertise-getAdvertise');


    }

    public function getEdit($id)
    {
        $advertise_edit=Advertise::where('id',$id)->paginate('12');
        $image_name = Storage::allFiles('public/', 'local');
        return view('admin.advertise.advertise-edit',['advertise_edit'=>$advertise_edit,'image_name'=>$image_name]);
    }

    public function edit(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'customer' => 'required|max:300',
            'image_url' => 'required|max:300',
            'address' => 'required|max:300',
            'link' => 'required|max:300',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.advertise-getEdit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $advertise= Advertise::find($request->id);
        $advertise->customer = $request->customer;
        $advertise->image_url = $request->image_url;
        $advertise->address = $request->address;
        $advertise->link = $request->link; 
        $advertise->save();
        return redirect()->route('admin.advertise-getAdvertise');

    }

    public function read($id)
    {
        $image_url= Advertise::where('id','=',$id)->get();
                
        return view('admin.advertise.advertise-read',['image_url'=>$image_url]);
    }

    public function del($id)
    {
        $advertise= Advertise::find($id);
        $advertise->delete();        
        return redirect()->route('admin.advertise-getAdvertise');
    }


}
