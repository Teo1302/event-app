<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and is an administrator
        if (auth()->check() && auth()->user()->is_admin) {
            // permite continuarea procesului adica requestului sa mearga mai departe
            return $next($request);

        }

        // If not an administrator, you can redirect to an error page or throw an exception
        abort(403, 'Unauthorized access.');
    }
}
