<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  mixed ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->usr_role; // sesuaikan nama kolom role di tabel users

        // kalau role user tidak ada dalam daftar roles -> tolak
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
