<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekUser
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->jenisAkun === 'user') {
            return $next($request);
        }

        return redirect()->back()
            ->with('errorHeader', 'Akses Ditolak')
            ->with('error', 'Hanya pengguna biasa yang dapat mengakses fitur ini.');
    }
}
