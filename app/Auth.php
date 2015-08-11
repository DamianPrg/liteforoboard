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

    public function isUserLogged()
    {
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

                session(['user_id' => $user->id]); // make user logged.

                return true;
            }
        }

        return false;
    }
}
