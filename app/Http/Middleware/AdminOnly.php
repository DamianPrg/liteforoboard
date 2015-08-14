<?php

namespace App\Http\Middleware;

use App\Auth;
use Closure;

/**
 * Only admin can access the page, if not admin redirected to home.
 */
class AdminOnly
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
            if($user->isAdmin())
            {
                return $next($request);
            }
        }

       // return redirect('/no-permission')->with('__middleware', 'AdminOnly');

        return redirect('/no-permission');
        //return redirect()->back()->withErrors(['No permission']);
    }
}
