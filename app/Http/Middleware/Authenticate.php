<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('user')) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}