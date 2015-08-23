<?php

namespace App;


class Auth
{
    public function getLoggedUser()
    {
        if( $this->isUserLogged() )
        {
            return User::find(session('user_id'));


        }

        return null;
    }

    public function getUser()
    {
    	if( $this->isUserLogged() )
        {
            return User::find(session('user_id'));


        }

        return null;
    }

    public function isUserLogged()
    {
//        dd(session('user_id'));

        if(session('user_id') != null)
        {
            return true;
        }

        return false;
    }

    /**
     * login user as user with '$id',
     * could come handy for administrator to inspect users accounts easier.
     */
    public function authAs($id = -1)
    {
        session(['user_id' => $id]);
    }

    public function isAdmin()
    {
    	if($this->isUserLogged())
    	{	
    		if($this->getLoggedUser()->isAdmin())
    		{
    			return true;
    		}
    	}

    	return false;
    }

    public function isGuest()
    {
    	if($this->isUserLogged())
    	{
    		return false;
    	}

    	return true;
    }



    public function isStaff()
    {
    	if($this->isAdmin())
    	{
    		return true;
    	}

    	return false;
    }

    /**
     * login user
     *
     * @param $usernname
     * @param $password - plain password
     *
     * @return bool
     */
    public function auth($username, $password)
    {
        $user = User::where('username', $username)->first();

      //dd($user);

        if($user == null)
        {
            return false;
        }



        if($user)
        {
            if(\Hash::check($password, $user->password))
            {
                // rehash password if needed
                if(\Hash::needsRehash($user->password))
                {
                    $user->password = bcrypt($password);
                    $user->save();
                }

                $user->online = true;
                $user->save();
                session(['user_id' => $user->id]); // make user logged.

                return true;
            }
        }

        return false;
    }

    public function logout()
    {
        $user = User::find(session('user_id'));
        $user->online = true;
        $user->save();

        \Session::forget('user_id');
    }
}
