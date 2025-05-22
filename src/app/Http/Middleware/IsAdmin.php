<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
