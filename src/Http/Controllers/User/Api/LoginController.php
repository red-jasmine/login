<?php

namespace RedJasmine\Login\Http\Controllers\User\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use RedJasmine\Captcha\Exceptions\CaptchaException;
use RedJasmine\Login\Exceptions\LoginException;
use RedJasmine\Login\Services\LoginService;

class LoginController extends Controller
{


    /**
     * 发送验证码
     * @param Request $request
     * @return JsonResponse
     * @throws CaptchaException
     */
    public function captcha(Request $request) : JsonResponse
    {
        // TODO  需要通过图形验证码
        $service = new LoginService('api');
        $captcha = $service->captcha([ 'username' => $request->input('username') ]);
        return self::success();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws CaptchaException
     */
    public function sms(Request $request) : JsonResponse
    {
        $service = new LoginService('api');
        $tokens  = $service->sms([ 'username' => $request->input('username'), 'code' => $request->input('code') ]);
        return self::success($tokens);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws LoginException
     */
    public function password(Request $request) : JsonResponse
    {
        $service = new LoginService('api');
        $tokens  = $service->password([ 'username' => $request->input('username'), 'password' => $request->input('password') ]);
        return self::success($tokens);
    }

}
