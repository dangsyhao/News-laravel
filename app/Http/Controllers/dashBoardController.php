<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Notificate;

class dashBoardController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $notifi_list=Notificate::orderBy('updated_at','desc')->paginate('1');
        return view('common.dashboard.index',['notifi_list'=>$notifi_list]);
    }

    public function getNoteContent($id)
    {
        $notifi_list= Notificate::where('id','=',$id)->get();
        return view('common.dashboard.notifi-Read',['notifi_list'=>$notifi_list]);
    }

}
