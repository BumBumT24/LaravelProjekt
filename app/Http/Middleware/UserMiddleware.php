<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && in_array(auth()->user()->role, ['admin', 'dyrektor', 'nauczyciel', 'user'])) {
            return $next($request);
        }
        abort(403, 'Brak dostępu.');
    }
}
