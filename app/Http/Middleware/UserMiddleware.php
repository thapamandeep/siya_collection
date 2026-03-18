<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    if(Auth::check() && Auth::user()->role_id == 2){
        return $next($request);
    }else{

    Session::flash('error','login your account please');

    return redirect()->route('get.login.page');
    }
    }
}
