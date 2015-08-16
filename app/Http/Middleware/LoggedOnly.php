<?php

namespace App\Http\Middleware;

use App\Auth;
use Closure;

/**
 * Only logged user can access page , if not logged redirected to home.
 */
class LoggedOnly
{
    protected $auth = null;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->isUserLogged())
        {
            return $next($request);
        }

        return redirect('/login');
    }
}
