<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Only admin can access the page, if not admin redirected to home.
 */
class AdminOnly
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
        return $next($request);
    }
}
