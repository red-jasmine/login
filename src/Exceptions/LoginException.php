<?php

namespace RedJasmine\Login\Exceptions;

use RedJasmine\Support\Exceptions\AbstractException;

class LoginException extends AbstractException
{


    public const  LOGIN_FIAL = 501010; // 账号或者密码错误

}
