<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna sudah login DAN merupakan admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Jika tidak, tolak akses dan arahkan ke halaman utama dengan pesan error.
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
