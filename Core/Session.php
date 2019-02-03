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
    private static $_sess_id;

    /**
     * @return void
     */
    public static function start()
    {
        if (!self::$_sessionStarted) {
            session_name(self::$_cookieName);
            session_start();
            self::$_sess_id = session_id();
            self::$_sessionStarted = true;
            self::addToSession();
            //self::sessionRead();
        }
    }

    /**
     * @param $key
     * @param $value
     * @return void
     */
    public static function set($key, $value): void
    {
        if (self::$_sessionStarted) {
            $_SESSION[$key] = $value;
        }
    }

    /**
     * @param $key
     * @param null $item
     * @return null
     * @throws \Exception
     */
    public static function get($key, $item = null)
    {
        if (Session::checkCookie()) {
            if (!self::$_sessionStarted) {
                return null;
            }
        }

        if (isset($item) && isset($_SESSION[$key][$item])) {
            return $_SESSION[$key][$item];
        }
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    /**
     * @return null
     * @throws \Exception
     */
    public static function getSession()
    {
        if (Session::checkCookie()) {
            if (!self::$_sessionStarted) {
                return null;
            }
        }
        return $_SESSION;
    }

    /**
     * @param $key
     * @return bool
     */
    public static function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @param $key
     * @return null
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
     * @throws \Exception
     */
    public static function destroy(): bool
    {
        if (self::$_sessionStarted) {
            setcookie(self::$_cookieName, '', time() - 1, '/');
            session_destroy();
            unset($_SESSION);
            self::$_sessionStarted = false;
            self::sessionGB();
            self::$_sess_id = '';
            return true;
        }
        return false;
    }

    /**
     * @return void
     */
    public static function display(): void
    {
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
    }

    /**
     * @return bool
     * @throws \Exception
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
    public static function addToSession(): void
    {
        Session::set('remote_addr', $_SERVER['REMOTE_ADDR']);
        Session::set('user_agent', $_SERVER['HTTP_USER_AGENT']);
        // Session::set(self::$email, session_encode());
    }

    /**
     * @return string
     * @throws \Exception
     */
    public static function sessionRead(): string
    {
        $result = SessionMapper::getDataWhere('session_id', self::$_sess_id);

        if (count($result) > 0) {
            $date = date("Y-m-d");
            SessionMapper::updateSession('date_touched', $date, self::$_sess_id);
            SessionMapper::updateSession('sess_data', session_encode(), self::$_sess_id);

            return $result[0]['sess_data'];
        } else {
            SessionMapper::addSession(session_encode(), self::$_sess_id);

            return '';
        }
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public static function sessionWrite($data): void
    {
        SessionMapper::updateSessionData($data, self::$_sess_id);
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public static function sessionAdd($data): void
    {
        SessionMapper::addSession($data, self::$_sess_id);
    }

    /**
     * @return string
     */
    public static function sessionId(): string
    {
        return session_id();
    }

    /**
     * @throws \Exception
     */
    public static function sessionGB(): void
    {
        SessionMapper::sessionGB(self::$_sess_id);
    }
}