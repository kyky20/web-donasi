<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global middleware...
    ];

    protected $middlewareGroups = [
        'web' => [
            // Middleware untuk web
        ],
        'api' => [
            // Middleware untuk API
        ],
    ];

    protected $routeMiddleware = [
        'cek.user' => \App\Http\Middleware\CekUser::class,
        'cek.admin' => \App\Http\Middleware\CekAdmin::class,
        'cek.login' => \App\Http\Middleware\CekLogin::class,
        // Tambahkan middleware lainnya di sini...
    ];
}
