<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsAdmin
{
    //Function to check if user is Admin or not 
    public function handle($request, Closure $next)
    {
        if(!Auth::user() || !Auth::user()->is_admin) {

            return redirect('/');
        }

        return $next($request);
    }
}
