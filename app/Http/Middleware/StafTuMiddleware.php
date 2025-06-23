<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class StafTuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->level_id == 2) {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->level_id == 3) {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->level_id == 4) {
            return $next($request);
        } else {
            return redirect()->route('error');
        }
    }
}
