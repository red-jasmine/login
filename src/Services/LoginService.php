<?php

namespace RedJasmine\Login\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use RedJasmine\Login\Events\UserLoginEvent;
use RedJasmine\Login\Exceptions\LoginException;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\User\Enums\UserStatus;

class LoginService
{

    public function __construct(protected string $guard = 'user')
    {
    }

    /**
     * @return void
     */
    public function validateStatus() : void
    {
        if(method_exists($this->guard()->user(),'isAllowLogin')){
            $this->guard()->user()->isAllowLogin();
        }

    }

    public function sms(array $credentials = [], $remember = false) : void
    {

    }


    protected function validateChinaPhoneNumber(string $number) : bool|int
    {
        return preg_match('/^1[34578]\d{9}$/', $number);
    }


    protected function validateEmail(string $number) : bool|int
    {
        return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', $number);
    }

    /**
     * 密码登入
     * @param array $credentials
     * @return array
     * @throws LoginException
     */
    public function password(array $credentials = []) : array
    {

        $username = $credentials['username'];
        unset($credentials['username']);
        // 确认 执行查询顺序
        $attempts['email']    = ($this->validateEmail($username) ? 2 : 0);
        $attempts['mobile']   = ($this->validateChinaPhoneNumber($username) ? 2 : 0);
        $attempts['username'] = 1;
        $isLogin              = collect($attempts)->sortDesc()->contains(function ($value, $key) use ($credentials, $username) {
            return $this->guard()->attempt(array_merge([], array_merge($credentials, [ $key => $username ])), true);
        });

        if ($isLogin) {
            // 验证状态
            $this->validateStatus();
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


