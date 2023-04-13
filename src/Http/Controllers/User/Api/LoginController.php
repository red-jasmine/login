<?php

namespace RedJasmine\Login\Http\Controllers\User\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RedJasmine\Login\Exceptions\LoginException;
use RedJasmine\Login\Services\LoginService;
use RedJasmine\User\Models\User;

class LoginController extends Controller
{


    public function captcha(Request $request)
    {

    }

    /**
     * @param Request $request
     * @return void
     */
    public function sms(Request $request)
    {

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
