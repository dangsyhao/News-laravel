<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LogoutController extends Controller
{
    public function __construct()
    {
        //write some things !
    }
    
    public function logout()
    {
       Auth::guard('web')->logout();
       return redirect()->route('site.login');
    }
}
