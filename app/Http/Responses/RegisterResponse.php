<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $home = auth()->user()->role_id == 1 ? '/admin' : '/member/dashboard';

        return redirect()->intended($home);
    }
}
