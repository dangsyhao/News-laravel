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
        $value = isset(Auth::user()->value) ? Auth::user()->value : '';
        if( $value !== 'admin'){
            return redirect()->back();
        }

        return $next($request);
    }
}
