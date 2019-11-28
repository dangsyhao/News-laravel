<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pageController extends Controller
{
    function __construct()
    {
        //
    }

    function errorPage(){
        return view('site.page.page._errorPage');
    }

    function contactPage(){
        return view('site.page.page.contactPage');
    }
}
