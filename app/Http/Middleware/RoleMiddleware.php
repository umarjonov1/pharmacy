<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/home');
        }

        $userRole = Auth::user()->role;

        // Проверяем, что роль пользователя соответствует одной из переданных
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Доступ запрещён
        abort(403, 'Доступ запрещён');
    }
}
