<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class IsLogedIn
{

    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('role')){
            return redirect()->to('/');
        }
        return $next($request);
    }
}
