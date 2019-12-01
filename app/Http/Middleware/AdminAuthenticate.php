<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Check It is Admin ?.
     */
    public function handle($request, Closure $next)
    {
        $user_role = isset(Auth::user()->User_category->user_role) ? Auth::user()->User_category->user_role : '';
        if( $user_role !== 'admin'){
            return redirect()->back();
        }

        return $next($request);
    }
}
