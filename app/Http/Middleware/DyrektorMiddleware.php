<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DyrektorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && in_array(auth()->user()->role, ['admin', 'dyrektor'])) {
            return $next($request);
        }
        abort(403, 'Brak dostępu.');
    }
}
