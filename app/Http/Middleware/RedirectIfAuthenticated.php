<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        // dd('handle() called', Auth::user()->is_admin , Auth::user()->name);
        
        
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Check if the authenticated user is an admin
                if (Auth::user()->is_admin == 1) {
                    return redirect(RouteServiceProvider::DASHBOARD);
                } else {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        }

        return $next($request);
    }
}
