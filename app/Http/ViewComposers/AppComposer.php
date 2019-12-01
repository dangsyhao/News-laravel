<?php


namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AppComposer
{
    protected $Auth_role;

    public function __construct()
    {
        $this->Auth_role = Auth::user()->User_category->user_role;
    }

    public function compose(View $view)
    {
        $view->with('Auth_role',$this->Auth_role);
    }


}