<?php

namespace App\Http\Requests;

use App\Auth;
use App\Http\Requests\Request;

class StoreTopicRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Auth $auth)
    {
        if($auth->isUserLogged())
        {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|min:6',
            'message' => 'required|min:15',
        ];
    }
}
