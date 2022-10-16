<?php
 
namespace App\Http\Responses;
 
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
 
class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        //$home = auth()->user()->is_admin ? '/admin' : '/dashboard';

        $home = auth()->user()->role_id == 1 ? '/admin' : '/member/dashboard';
 
        return redirect()->intended($home);

    
    }
}
