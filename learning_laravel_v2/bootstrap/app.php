<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\TokenMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    //Este arquivo que vai chamar o TokenMiddleware
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
        'checkToken' =>TokenMiddleware::class
        ]);
        })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
