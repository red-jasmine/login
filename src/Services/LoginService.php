<?php

namespace RedJasmine\Login\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Liushoukun\LaravelProjectTools\Contracts\User;
use RedJasmine\Login\Events\UserLoginEvent;

class LoginService
{


    protected string $guard = 'user';

    public function sms(array $credentials = [], $remember = false)
    {

    }

    public function password(array $credentials = [], $remember = false)
    {
        if ($this->guard()->attempt($credentials, $remember)) {
            $this->responseData();
        }
    }

    public function login(User&Authenticatable $user) : array
    {
        $this->guard()->login($user);

        return $this->responseData();
    }

    public function guard() : Guard|StatefulGuard
    {
        return Auth::guard($this->guard);
    }


    public function responseData() : array
    {
        return [
            'guard' => $this->guard,
            'token' => (string)$this->guard()->getToken(),
            'exp'   => $this->guard()->getPayload()->get('exp'),
            'ttl'   => (int)app('tymon.jwt.claim.factory')->getTTL() * 60,
        ];
    }

}
