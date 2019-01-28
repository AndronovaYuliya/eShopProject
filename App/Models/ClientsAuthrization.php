<?php

namespace App\Models;

use Core\Authorization;
use Core\Session;

/**
 * Class ClientsAuthrization
 * @package App\Models
 */
class ClientsAuthrization extends Authorization
{
    protected static $login;

    /**
     * @param $login
     * @return string
     * @throws \Exception
     */
    public static function login($login):string
    {
        self::$logged = true;
        self::$login = $login;
        self::addToSession();
        Session::set('login', $login);
        return Session::sessionRead();
    }
}
