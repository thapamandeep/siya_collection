<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    if(Auth::check() && Auth::user()->role_id == 1){

    
        return $next($request);
    }else{

    Session::flash('error','login your account');

    return redirect()->route('get.login.page');
    }
    }
}
