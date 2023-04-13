<?php

namespace RedJasmine\Login\Http\Controllers\User\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RedJasmine\Login\Services\LoginService;
use RedJasmine\User\Models\User;

class LoginController extends Controller
{

    /**
     * @param Request $request
     * @return void
     */
    public function sms(Request $request)
    {

    }

    public function password(Request $request) : JsonResponse
    {
        $service = new LoginService('buyer');
        $tokens = $service->password([ 'username' => 'liushoukun', 'password' => '123456' ]);
        return self::success($tokens);
    }

}
