<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use App\Notificate;


class dashboardController extends Controller
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
    public function dashboard()
    {
        $notifi_list=Notificate::paginate('1');

        return view('dashboard.index.dashboard',['notifi_list'=>$notifi_list]);
    }

    
}
