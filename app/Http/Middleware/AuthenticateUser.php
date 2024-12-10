<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            // Redirect to login if not authenticated
            return redirect()->route('login')->with('error', 'You must be logged in to access this page');
        }

        // Check if authenticated user has admin privileges
        if (!Auth::user()->is_admin()) {
            // Redirect with error if not an admin
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}
