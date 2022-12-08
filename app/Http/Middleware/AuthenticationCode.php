<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationCode
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check())
            if (is_null(auth()->user()->code_verified_at))
                return redirect()->route('auth.code.verify');
            else
                return $next($request);
        else
            return $next($request);
    }
}
