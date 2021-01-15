<?php

namespace App\Http\Middleware;

use App\Models\ActivityModel;
use Closure;

class SignUpMiddleware
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
        $model = new ActivityModel();
        $model->insert($request->ip(), "register");

        \Log::info("Host with IP: " . $request->ip() . " visited your register page");

        return $next($request);
    }
}
