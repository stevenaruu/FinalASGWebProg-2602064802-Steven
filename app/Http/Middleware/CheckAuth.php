<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($role === 'guest' && Auth::check()) {
            return redirect()->route('home');
        }

        if ($role === 'auth' && !Auth::check()) {
            return redirect()->route('home');
        }
        
        return $next($request);
    }
}
