<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user login dan jenis akunnya adalah admin
        if (Auth::check() && Auth::user()->jenisAkun === 'admin') {
            return $next($request);
        }

        // Redirect jika bukan admin
        return redirect()->route('donatur.public') // atau route lain yang aman untuk user biasa
            ->with('errorHeader', 'Akses Ditolak')
            ->with('error', 'Halaman ini hanya dapat diakses oleh admin.');
    }
}
