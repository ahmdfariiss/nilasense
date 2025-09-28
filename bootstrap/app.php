<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
    
    // 1. Daftarkan alias untuk middleware 'CheckRole'
    $middleware->alias([
        'role' => \App\Http\Middleware\CheckRole::class,
    ]);

    // 2. Atur path redirect setelah login di sini
    $middleware->redirectUsersTo('/'); 

})
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
