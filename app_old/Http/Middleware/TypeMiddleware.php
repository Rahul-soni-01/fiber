<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class TypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (in_array($user->type, $types)) {
                return $next($request);
            }

            return $next($request);
        }
        // If user is unauthorized, redirect them
        return redirect('/unauthorized');
    }
}
