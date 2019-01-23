<?php

namespace Core;

use Core\Session;

/**
 * Class Authorization
 * @package Core
 */
abstract class Authorization
{
    private static $email;
    private static $password;
    private static $logged = false;
    private static $user = null;

    /**
     * @return string
     */
    public static function getEmail(): string
    {
        return self::$email;
    }

    /**
     * @return string
     */
    private static function getPassword(): string
    {
        return self::$password;
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public static function login($email, $password): bool
    {
        if ($email == self::$email && password_verify($password, self::$password)) {
            self::$logged = true;
            self::$user = self::$email;
            Session::start();
            self::addToSession();
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function isAuth(): bool
    {
        Session::start();
        $data = Session::get(self::$email);
        if (!empty($data) && Session::checkCookie()) {
            self::$logged = true;
            session_decode($data);
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function logout(): bool
    {
        return Session::destroy();
    }

    /**
     * @return void
     */
    private static function addToSession(): void
    {
        Session::set('remote_addr', $_SERVER['REMOTE_ADDR']);
        Session::set('user_agent', $_SERVER['HTTP_USER_AGENT']);
        Session::set(self::$email, session_encode());
    }
}