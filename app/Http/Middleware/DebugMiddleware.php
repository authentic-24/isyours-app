<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DebugMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('Request URL: ' . $request->fullUrl());
        Log::info('Session ID: ' . $request->session()->getId());
        return $next($request);
    }
}