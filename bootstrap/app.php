<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'cek.admin' => \App\Http\Middleware\CekAdminMiddleware::class,
        'cek.user'  => \App\Http\Middleware\CekUserMiddleware::class,
    ]);
})

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
