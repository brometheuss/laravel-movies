<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsLogged
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
        if($request->session()->has('user')){
            $id = session()->get('user')->role_id;
            $user = session()->get('user')->name;
            \Log::info("User '" . $user . "' with an ID: " . $id . " tried accessing the login/register page while logged.");
            return redirect()->route('home')->with('already-logged', 'Already logged in.');
        }
        return $next($request);
    }
}
