<?php

namespace RedJasmine\Login\Http\Controllers\User\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RedJasmine\Login\Http\Controllers\User\Controller;
use RedJasmine\User\Models\User;

class LoginController extends Controller
{
    public function password(Request $request) : JsonResponse
    {
        $user  = User::findOrFail(1);
        $token = Auth::guard('api')->login($user);
        return self::success((string)$token);
    }

}
