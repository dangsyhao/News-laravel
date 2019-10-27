<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Notificate;

class AuthorNotificateController extends Controller
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
        $notifi_list=Notificate::paginate(12);
 
        return view('author.notifi.notifi-getNotifi',['notifi_list'=>$notifi_list]);
    
    }

    
    public function read($id)
    {
        $notifi_list= Notificate::where('id','=',$id)->get();
                
        return view('author.notifi.notifi-Read',['notifi_list'=>$notifi_list]);
    }

  

}
