<?php

namespace Core;

/**
 * Class Session
 * @package Core
 */
abstract class Session
{
    private const  PATH = '/var/session';

    private static $_sessionStarted = false;
    private static $_cookieName = 'sid';
    private static $_email;
    private static $_started = false;
    private static $_lifeTime = 86400;
    private static $_sess_id;

    /**
     * @return void
     */
    public static function start()
    {
        if (!self::$_sessionStarted) {
            session_set_cookie_params(self::$_lifeTime);
            session_name(self::$_cookieName);
            session_start();
            self::$_sess_id=session_id();
            self::$_sessionStarted = true;
            self::addToSession();
            self::sessionAdd(session_encode());
        }
    }

    /**
     * @param $key
     * @param $value
     */
    public static function set($key, $value)
    {
        if (self::$_sessionStarted) {
            $_SESSION[$key] = $value;
            self::sessionWrite(session_encode());
        }
    }

    /**
     * @param $key
     * @return null
     */
    public static function get($key)
    {
        if (Session::checkCookie())
        if (!self::$_sessionStarted) {
            return null;
        }

        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    /**
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @param $key
     */
    public static function delete($key)
    {
        if (!self::$_sessionStarted) {
            return null;
        }

        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * @return bool
     */
    public static function destroy(): bool
    {
        if (self::$_sessionStarted) {
            setcookie(self::$_cookieName, '', time() - 1, '/');
            session_destroy();
            unset($_SESSION);
            self::$_started = false;
            return true;
        }
        return false;
    }

    /**
     * @return void
     */
    public static function display()
    {
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
    }

    /**
     * @param $cookieName
     * @return bool
     */
    public static function checkCookie(): bool
    {
        if (empty($_COOKIE[self::$_cookieName])) {
            return false;
        }

        if ($_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT'] && $_SESSION['remote_addr'] == $_SERVER['REMOTE_ADDR']) {
            return true;
        } else {
            self::destroy();
            return false;
        }
    }


    /**
     * @return void
     */
    private static function addToSession(): void
    {
        Session::set('remote_addr', $_SERVER['REMOTE_ADDR']);
        Session::set('user_agent', $_SERVER['HTTP_USER_AGENT']);
       // Session::set(self::$email, session_encode());
    }

    /**
     * @return string
     */
    public static function sessionRead()
    {
        $result = SessionMapper::getDataWhere('session_id', self::$_sess_id);
        // Если данные получены, нам нужно обновить дату
        // доступа к данным:
        if (count($result) > 0) {
            SessionMapper::updateSession('date_touched', self::$_sess_id);
            return html_entity_decode($result['sess_data']);
        } else {
            SessionMapper::addSession(self::$_sess_id);
            return '';
        }
    }

    /**
     * @param $data
     */
    public static function sessionWrite($data)
    {
        SessionMapper::updateSessionData($data, self::$_sess_id);
    }

    /**
     * @param $data
     */
    public static function sessionAdd($data)
    {
        SessionMapper::addSession($data, self::$_sess_id);
    }

    /**
     * @return void
     */
    public static function sessGB()
    {
        SessionMapper::sessGB(self::$_lifeTime);
    }

}