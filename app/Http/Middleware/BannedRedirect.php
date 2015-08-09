<?php

namespace App\Http\Middleware;

use Closure;

/**
 * If logged user is banned redirect to 'banned message' page.
 */
class BannedRedirect
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
    	// todo: check...

        return $next($request);
    }
}
