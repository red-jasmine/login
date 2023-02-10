<?php

use Illuminate\Support\Facades\Route;
use RedJasmine\Support\Helpers\DomainRoute;

Route::group([
                 'domain'     => DomainRoute::domain('login'),
                 'prefix'     => 'buyers/login',
                 'middleware' => 'web',
                 'namespace'  => 'RedJasmine\\Login\\Http\\Controllers\\User\\Web'
             ], function () {

    Route::get('password', 'LoginController@password')->name('buyers.web.login.password');

});
