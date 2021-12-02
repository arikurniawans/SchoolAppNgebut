<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(in_array(Auth::user()->level, $roles) || Auth::user()->level == 'superadmin' || Auth::user()->level == 'admin') {
            return $next($request);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
