<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    protected $auth = null;

    public function login(Requests\LoginRequest $request, Auth $auth)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $this->auth = $auth;

        if($this->auth->auth($username, $password))
        {
            // code, code...
            return redirect('/');
        }

        return redirect('/');
    }
}
