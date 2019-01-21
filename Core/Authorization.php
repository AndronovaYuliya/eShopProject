<?php

namespace Core;

use Core\Session;

abstract class Authorization
{
    private static $email;
    private static $password;
    private static $logged = false;
    private static $user = null;

    /**
     * @return string $login
     */
    public static function getEmail():string
    {
        return self::$email;
    }

    /**
     * @return string $password
     */
    private static function getPassword():string
    {
        return self::$password;
    }

    /**
     * @return bool
     */
    public static function login($email, $password):bool
    {
        if($email==self::$email && password_verify($password,self::$password))
        {
            self::$logged=true;
            self::$user=self::$email;
            Session::start();
            self::addToSession();
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function isAuth():bool
    {
        Session::start();
        $data=Session::get(self::$email);
        if (!empty($data) && Session::checkCookie())
        {
            self::$logged=true;
            session_decode($data);
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function logout():bool
    {
        return Session::destroy();
    }
    /*
     * @return bool
    */
    public static function checkEmail($email):bool
    {
        return preg_match('/^[a-z0-9]{3,20}$/i', trim($email));
    }

    /*
     * @return bool
    */
    public static function checkPass($pass):bool
    {
        return true;
    }

    /*
     * @void
    */
    private static function addToSession()
    {
        Session::set('remote_addr', $_SERVER['REMOTE_ADDR']);
        Session::set('user_agent', $_SERVER['HTTP_USER_AGENT']);
        Session::set(self::$email, session_encode());
    }
}