<?php

namespace App\Http\Middleware;

use App\Auth;
use Closure;

/**
 * Only staff can access the page, if not admin redirected to home.
 */
class StaffOnly
{
    protected $auth = null;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->auth = new Auth();

        // is user logged?
        if($this->auth->isUserLogged())
        {
            $user = $this->auth->getLoggedUser();

            // is user admin?
            if($user->isStaff())
            {
                return $next($request);
            }
        }

        return redirect()->back()->withErrors(['No permission']);
    }
}
