<?php

use App\Http\Middleware\SetGuardSessionCookie;
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
        $middleware->redirectGuestsTo(function($request) {
            // If the path starts with 'admin/', redirect to the admin login route.
            if ($request->is("admin/*")) {
                return route("login.admin");
            }
    
            // Otherwise, use the default 'customer' login route.
            return route("login");
        });

        $middleware->append(SetGuardSessionCookie::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
