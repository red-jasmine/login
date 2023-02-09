<?php

namespace RedJasmine\Login\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RedJasmine\User\Models\User;

class LoginController extends Controller
{
    public function password(Request $request)
    {
        $user =  User::find(1);

        $token  =  Auth::guard('api')->login($user);


        return self::success((string)$token);
    }

}
