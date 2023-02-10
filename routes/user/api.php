<?php

use Illuminate\Support\Facades\Route;
use RedJasmine\Support\Helpers\DomainRoute;

Route::group([
                 'domain'     => DomainRoute::domain('login'),
                 'prefix'     => 'api/user/login',
                 'middleware' => 'api',
                 'namespace'  => 'RedJasmine\\Login\\Http\\Controllers\\User\\Api'
             ], function () {

    Route::post('password', 'LoginController@password')->name('user.api.login.password');

});
