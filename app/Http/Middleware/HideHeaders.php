<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HideHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Remove X-Powered-By headers that reveal PHP version
        $response->headers->remove('X-Powered-By');

        // Remove Server header (may not work at Laravel level for all servers)
        $response->headers->remove('Server');

        // Remove other potential X-Powered-By headers like PleskLin
        $response->headers->remove('X-Powered-By-Plesk');

        // Remove additional security-sensitive headers
        $response->headers->remove('X-AspNet-Version');
        $response->headers->remove('X-AspNetMvc-Version');

        // Add security headers while we're at it
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        return $response;
    }
}
