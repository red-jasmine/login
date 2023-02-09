<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'login',
    'middleware' => 'api',
    'namespace' => 'RedJasmine\\Login\\Http\\Controllers'
             ], function () {


    Route::post('password','Buyer\LoginController@password');

});
