<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {
    public function handle(Request $request, Closure $next): Response {
        $user = Auth::user();
        // Check for 'role' or 'is_admin'
        if ($user && ((isset($user->role) && $user->role === 'admin') || (isset($user->is_admin) && $user->is_admin))) {
            return $next($request);
        }
        abort(403, 'Unauthorized');
    }
}
