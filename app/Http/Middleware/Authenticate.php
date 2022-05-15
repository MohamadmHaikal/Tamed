<?php

namespace App\Http\Middleware;

use Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Redirect;

class Authenticate
{
    public function handle($request, Closure $next, $type = '')
    {
        if ($type != 'manger') {
            if (\Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()) {
                return $next($request);
            } else {
                return Redirect::route('login.switch')->withErrors('Please log in!');
            }
        } else {
            if (Auth::guard('mangers')->user()) {
                return $next($request);
            } else {
                return Redirect::route('login.switch');
            }
        }
    }
}
