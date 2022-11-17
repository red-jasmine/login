<?php

namespace RedJasmine\Login\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RedJasmine\Login\Login
 */
class Login extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \RedJasmine\Login\Login::class;
    }
}
