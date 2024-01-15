<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $home = auth()->user()->is_admin ? '/admin' : '/user/api-tokens';

        return redirect()->intended($home);
    }
}
