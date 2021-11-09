<?php

namespace App\Http\Middleware;

use App\Models\Profile;
use Closure;
use Illuminate\Http\Request;


class AdminAccess
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
        if(auth()->check()){
            if(auth()->user()->profile->pluck('COD_PERFIL')->contains(Profile::ADMIN)) {
                return $next($request);
            }
            return response()->view('site.home.index');
        }else{
           auth()->logout();
           return response()->view('site.login.index');

        }

    }
}
