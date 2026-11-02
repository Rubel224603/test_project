<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    //\Log::info('middleware hit', [$request->method(), $request->fullUrl()]);
         if (!Auth::check()) {
        return redirect()->route('login')->with('status', 'Please login first.');
    }
        return $next($request);
    }
}
