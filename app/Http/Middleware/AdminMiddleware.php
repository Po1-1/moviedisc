<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna sudah login DAN merupakan admin
        if (Auth::check() && Auth::user()->is_admin) {
            // Jika ya, izinkan request untuk melanjutkan
            return $next($request);
        }

        // Jika tidak, tolak akses dan arahkan ke halaman utama dengan pesan error.
        // Ini adalah perbaikan krusial.
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
