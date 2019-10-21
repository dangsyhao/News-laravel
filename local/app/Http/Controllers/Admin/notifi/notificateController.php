<?php

namespace App\Http\Controllers\Admin\notifi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Notificate;

class notificateController extends Controller
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
    public function notifi()
    {  
        $notifi_list=Notificate::paginate(12);
 
        return view('admin.notifi.notifi-getNotifi',['notifi_list'=>$notifi_list]);
    
    }


    public function getAdd()
    {
        return view('admin.notifi.notifi-Add');
    }


    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:300',
            'content' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.notifi-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $notifi = new Notificate;
       
        $notifi->title = $request->title;
        $notifi->content = $request->content; 
        $notifi->save();
        return redirect()->route('admin.notifi-getNotifi');


    }

    public function getEdit($id)
    {
        $notifi_edit=Notificate::where('id',$id)->paginate('12');
       return view('admin.notifi.notifi-Edit',['notifi_edit'=>$notifi_edit]);
    }

    public function edit(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'title' => 'required|max:300',
            'content' => 'required|max:1000'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.notifi-getEdit')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $notifi =Notificate::find($request->id);
        $notifi->title = $request->title;
        $notifi->content = $request->content; 
        $notifi->save();
        return redirect()->route('admin.notifi-getNotifi');

    }

    public function read($id)
    {
        $notifi_list= Notificate::where('id','=',$id)->get();
                
        return view('admin.notifi.notifi-Read',['notifi_list'=>$notifi_list]);
    }

    public function del($id)
    {
        $notifi= Notificate::find($id);
        $notifi->delete();        
        return redirect()->route('admin.notifi-getNotifi');
    }


}
