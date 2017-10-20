<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsAdmin
{
    //Function to check if user is Admin or not 
    public function handle($request, Closure $next)
    {
        if(!$request->user() || !$request->user()->is_admin) {

            return redirect('/login');
        }

        return $next($request);
    }
}
