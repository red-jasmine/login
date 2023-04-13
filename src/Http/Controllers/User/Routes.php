<?php

namespace RedJasmine\Login\Http\Controllers\User;

use Closure;
use Illuminate\Support\Facades\Route;
use RedJasmine\Login\Http\Controllers\User\Api\LoginController;

class Routes
{


    public static function api(Closure $routes = null) : void
    {

        Route::group([
                         'middleware' => [],
                         'prefix'     => 'login',
                     ], function () use ($routes) {


            Route::post('password', [ LoginController::class, 'password' ])->name('user.api.login.password');


            if ($routes) {
                $routes();
            }

        });

    }

}
