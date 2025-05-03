<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and if the user type is 'admin'
        if (Auth::check()) {
            if (Auth::user()->user_type !== 'superadmin') {
                // If the user is not an admin, redirect them to the home page or any other route
                return redirect('/home');
            }
        }

        // Proceed to the next middleware if user type is valid
        return $next($request);
    }
}
