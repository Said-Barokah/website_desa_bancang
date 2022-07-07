<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
class LoginResponse implements LoginResponseContract
{
    // use Auth
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function toResponse($request)
    {
        // User::bootHasRoles()
        // return Redirect::route('dashboard');


        $user = Auth::user();
        if($user->email_verified_at != null){
            if($user->hasRole('admin')){
                return Redirect::route('dashboard');
            }
            else if($user->hasRole('user')) {
                return Redirect::route('home');
            }
        }
        else {
            return Redirect::route('verification.notice');
        }
    }

}
