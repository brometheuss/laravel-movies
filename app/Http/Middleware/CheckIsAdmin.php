<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('user')){
            \Log::critical("Host with an IP " . $request->ip() . " tried to access the admin page. [NOT LOGGED]");
            return redirect()->route('home');
        }


        $user = $request->session()->get('user');

        if($user->role_id != 1) {
            \Log::critical("Host with an IP " . $request->ip() . " tried to access the admin page. [UNAUTHORIZED]");
            return redirect()-> route('home');
        }

        return $next($request);
    }
}
