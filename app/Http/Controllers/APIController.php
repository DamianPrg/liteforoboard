<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
    public function user($id)
    {
        $u = User::find($id);

        if($u) {
            return response()->json([
                'username' => $u->username,
                'id' => $u->id,
                'admin' => $u->isAdmin()
            ]);
        }
        else {
            return response()->json(['error' => true]);
        }
    }

    public function auth($username, $password)
    {
        $u = User::where('username', $username)->first();

        if($u)
        {
            if(\Hash::check($password, $u->password))
            {
                return response()->json(['ok' => true]);
            }
        }

        return response()->json(['ok' => false]);
    }
}
