<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole {
    public function handle(Request $request, Closure $next, $role) {
        // Jika pengguna tidak login ATAU rolenya tidak sesuai
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Arahkan kembali ke halaman utama
            return redirect('/');
        }
        return $next($request);
    }
}
