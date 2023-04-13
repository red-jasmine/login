<?php

namespace RedJasmine\Login\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use RedJasmine\Login\Events\UserLoginEvent;
use RedJasmine\Login\Exceptions\LoginException;
use RedJasmine\Support\Contracts\UserInterface;

class LoginService
{

    public function __construct(protected string $guard = 'user')
    {
    }

    public function sms(array $credentials = [], $remember = false) : void
    {

    }

    /**
     * 密码登入
     * @param array $credentials
     * @param $remember
     * @return array
     * @throws LoginException
     */
    public function password(array $credentials = [], $remember = true) : array
    {
        if ($this->guard()->attempt($credentials, true)) {
            return $this->responseData();
        }
        throw new LoginException('账号密码错误', LoginException::LOGIN_FIAL);
    }

    /**
     * 手动登录
     * @param Authenticatable&UserInterface $user
     * @return array
     */
    public function login(UserInterface&Authenticatable $user) : array
    {
        $this->guard()->login($user);

        return $this->responseData();
    }

    public function guard() : Guard|StatefulGuard
    {
        return Auth::guard($this->guard);
    }


    /**
     * 登入成功响应参数
     * @return array
     */
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


