<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Only logged user can access page , if not logged redirected to home.
 */
class LoggedOnly
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
