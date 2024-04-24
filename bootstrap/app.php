<?php

use App\Http\Middleware\PermissionsMiddleware;
use App\Http\Middleware\RoleMiddleware;
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
        $middleware->alias([
            'role' => RoleMiddleware::class,
           
        ])->statefulApi();
        // $middleware->alias([
        //     'permissions' => PermissionsMiddleware::class
        //     ])->statefulApi(); 
        })
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware->alias([
            'permissions' => PermissionsMiddleware::class
            ])->statefulApi(); 
        })
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
