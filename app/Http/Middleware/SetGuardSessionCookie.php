<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetGuardSessionCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();

        if ($request->is('admin/*')) {
            config(['session.cookie' => 'admin_session']);
        } else {
            config(['session.cookie' => 'customer_session']);
        }

        return $next($request);


        // $host = $request->getHost(); // e.g., adminshopbop.yourdomain.com

        // if (str_starts_with($host, 'adminshopbop.')) {
        //     config(['session.cookie' => 'admin_session']);
        // } else {
        //     config(['session.cookie' => 'customer_session']);
        // }

        // return $next($request);
    }
}
