<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class userType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if (Auth::check()) {
        $requestUri = $request->getRequestUri();
        if (strpos($request->getRequestUri(), '/dashboard?page=') !== false && auth()->user()->user_type == 'designer') {
            return $next($request);
        }
        if (auth()->user()->user_type == 'designer' && $requestUri == '/dashboard') {
            return $next($request);
        } elseif (auth()->user()->user_type == 'user' && $requestUri == '/dashboard-overview') {
            return $next($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
        
    } 

    // If user is not authenticated, proceed with next middleware or route
    return $next($request);
}

}
