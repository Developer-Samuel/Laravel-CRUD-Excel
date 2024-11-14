<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectHome
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('/')) {
            return redirect()->route('users.index');
        }

        return $next($request);
    }
}
