<?php

namespace RedJasmine\Login\Http\Controllers\User\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RedJasmine\Login\Http\Controllers\User\Controller;
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

        $user  = User::findOrFail(1);
         $data = (new LoginService())->login($user);
        return self::success($data);
    }

}
