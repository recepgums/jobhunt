<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PhoneVerifiedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        app('redirect')->setIntendedUrl($request->url());

        if (!auth()->check())
            return redirect('login');

       /* todo envden ayarlanmaliif (! auth()->user()->has_verified_phone)
            return redirect()->route('phone_verify');*/

        return $next($request);
    }
}
