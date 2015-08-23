<?php

namespace App\Http\Middleware;

use App\Auth;
use App\User;
use Carbon\Carbon;
use Closure;

/**
 *
 * Doing this, that way doesn't require use of cron tasks.
 *
 * Class UpdateUsersOnlineStatuses
 * @package App\Http\Middleware
 */
class UpdateUsersOnlineStatuses
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
            $this->auth->getLoggedUser()->updateLastActivity();
        }

        $online_users = User::where('online', true)->get();

        foreach($online_users as $online_user)
        {
            if($online_user->isInactive())
            {
                $online_user->update(['online' => false]);
                echo "Jeden offline!";
            }
            else
            {
                $online_user->update(['online' => true]);
            }
        }


        return $next($request);
    }
}
