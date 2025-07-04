<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = session('admin') ?? session('manager');

        if (!$user) {
            return redirect()->route('login.form')->with('error', 'Harap login terlebih dahulu.');
        }

        $userRole = session('admin') ? 'admin' : 'manager';

        if (!in_array($userRole, $roles)) {
            return redirect()->route('login.form')->with('error', 'Akses tidak diizinkan.');
        }

        return $next($request);
    }
}
