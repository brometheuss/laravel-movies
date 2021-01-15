<?php

namespace App\Http\Middleware;

use App\Models\IpAddressModel;
use Closure;

class CheckIp
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
        $upisBaza = new IpAddressModel();
        $upisBaza->insertIp($request->ip());

        \Log::info("Pokusaj pristupa sa adrese:" . $request->ip());
        \Log::error("Greska prilikom pristupa sa adrese:" . $request->ip());

        return $next($request);
    }
}
