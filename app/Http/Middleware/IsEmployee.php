<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IsEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('role') && Session::get('role') != 'employee'){
            return redirect()->to('/dashboard')->with('authmsg', 'ou are not Authorized');
        }
        return $next($request);
    }
}
