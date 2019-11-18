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

    public function getAdvertise()
    {  
        $advertise_list=Advertise::paginate(10);
        return view('admin.advertise.advertise-getAdvertise',['advertise_list'=>$advertise_list]);
    }

    public function getAdd()
    {   
        return view('admin.advertise.advertise-add');
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer' => 'required|max:225',
            'image_url' => 'required|max:225',
            'info' => 'required|max:1000',
            'link' => 'required|max:225',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.advertise-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        $advertise = new Advertise;
        $advertise->customer = $request->customer;
        $advertise->image_url = $request->image_url;
        $advertise->info = $request->info;
        $advertise->link = $request->link;
        $advertise->save();
        return redirect()->route('admin.advertise-getAdvertise');
    }

    public function getEdit($id)
    {
        if(isset($id)){
            $advertise_edit=Advertise::where('id',$id)->paginate('10');
        }
        return view('admin.advertise.advertise-edit',['advertise_edit'=>$advertise_edit]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer' => 'required|max:300',
            'image_url' => 'required|max:300',
            'info' => 'required|max:300',
            'link' => 'required|max:300',
        ]);

        if ($validator->fails()){
            return redirect()->route('admin.advertise-getEdit',['id'=>$request->id])
                        ->withErrors($validator)
                        ->withInput();
        }
        $advertise= Advertise::find($request->id);
        $advertise->customer = $request->customer;
        $advertise->image_url = $request->image_url;
        $advertise->info = $request->info;
        $advertise->link = $request->link; 
        $advertise->save();
        //
        return redirect()->route('admin.advertise-getAdvertise');
    }

    public function read($id)
    {
        if(isset($id)){
            $Customer_adv = new Advertise ;
            $customer_info= $Customer_adv->where('id','=',$id)->get();
        }

        return view('admin.advertise.advertise-read',['customer_info'=>$customer_info]);
    }

    public function del($id)
    {
        if(isset($id)){
            $Adv = new Advertise;
            $Adv_query = $Adv->find($id);

            if($Adv_query->exists()){
                $Adv_query->delete();
            }
        }

        return redirect()->back();
    }

}
