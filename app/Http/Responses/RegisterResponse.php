<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Http\Responses\RegisterResponse as RegisterResponseContract;

class RegisterResponse extends RegisterResponseContract
{

    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function toResponse($request)
    {
        $this->guard->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route('login')->with('success','pendaftaran anda berhasil, silakan login dan dapatkan verifikasi email');
    }
}
