<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle($request, Closure $next, $Roles)
    {
        $user = $request->user();

        if ($user && $user->Roles === $Roles) {
            return $next($request);

        }

        abort(403, 'Unauthorized');
    }
}
