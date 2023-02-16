<?php

use Illuminate\Support\Facades\Route;
use RedJasmine\Support\Helpers\DomainRoute;

Route::group([
                 'domain'     => DomainRoute::domain('login', true),
                 'prefix'     => DomainRoute::userApiPrefix('login'),
                 'middleware' => [ 'api', ],
                 'namespace'  => 'RedJasmine\\Login\\Http\\Controllers\\User\\Api'
             ], static function () {

    Route::group([ 'middleware' => [ 'auth:user' ] ], static function () {


    });
    Route::post('password', 'LoginController@password')->name('user.api.login.password');

});
