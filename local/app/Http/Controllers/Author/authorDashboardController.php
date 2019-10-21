<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Notificate;

class authorDashboardController extends Controller
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

        return view('author.dashboard.dashboard',['notifi_list'=>$notifi_list]);
    }

}
