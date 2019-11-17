<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        //
    }

    public function showLoginForm()
    {
        if(Auth::check()){
            return redirect()->back();
        }

      return view('auth.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Login to Admin Dashboard
      if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
          if(Auth::user()->User_Category->user_role == 'admin'){
              return redirect()->route('admin.dashboard');
          }elseif(Auth::user()->User_Category->user_role == 'author'){
              return redirect()->route('author.dashboard');
          }else{
              return redirect()->route('site.login');
          }
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    
}
