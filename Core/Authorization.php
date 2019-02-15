<?php

namespace Core;

use Core\Session;

/**
 * Class Authorization
 * @package Core
 */
abstract class Authorization
{
    protected static $email;
    protected static $login;
    protected static $logged = false;

    /**
     * @param $key
     * @param $value
     * @return string
     * @throws \Exception
     */
    public static function login($key, $value): string
    {
        self::$logged = true;
        self::addToSession();
        Session::set($key, $value);

        return Session::sessionRead();
    }

    /**
     * @param $key
     * @return bool
     * @throws \Exception
     */
    public static function isAuth($key): bool
    {
        if (!Session::get($key) || !Session::checkCookie()) {
            return false;
        };

        return true;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public static function logout(): bool
    {
        return Session::destroy();
    }

    /**
     * @return void
     */
    protected static function addToSession(): void
    {
        Session::set('remote_addr', $_SERVER['REMOTE_ADDR']);
        Session::set('user_agent', $_SERVER['HTTP_USER_AGENT']);
    }
}
