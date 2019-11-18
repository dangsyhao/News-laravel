<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Notificate;

class authorDashboardController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $notifi_list=Notificate::orderBy('updated_at','desc')->paginate('10');
        return view('author.dashboard.dashboard',['notifi_list'=>$notifi_list]);
    }

    public function getNoteContent($id)
    {
        $notifi_list= Notificate::where('id','=',$id)->get();
        return view('author.dashboard.notifi-Read',['notifi_list'=>$notifi_list]);
    }

}
