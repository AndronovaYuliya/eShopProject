<?php

namespace Core;

use Core\SessionMapper;

abstract class Session
{
    private static $_sessionStarted = false;
    private static $_cookieName = 'sid';
    private static $_started = false;
    private static $_lifeTime = 86400;
    private static $_sess_id;

    /*
    * @ Return void
    */
    public static function start()
    {
        if (!self::$_sessionStarted) {
            session_set_cookie_params(self::$_lifeTime);
            session_save_path(dirname($_SERVER['DOCUMENT_ROOT']) . '/Shop/var/session');
            session_name(self::$_cookieName);
            session_start();
            self::$_sessionStarted = true;
        }
    }

    /**
     * @param $key
     * @param $value
     *
     * @ Return void
     */
    public static function set($key, $value)
    {
        if (!self::$_sessionStarted) {
            $_SESSION[$key] = $value;
        }
    }

    /**
     * @param $key
     *
     * @ Return Mixed
     */
    public static function get($key)
    {
        if (!self::$_sessionStarted) {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }
        }
        return null;
    }

    /**
     * @param $key
     *
     * @ Return void
     */
    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @param $key
     *
     * @ Return void
     */
    public static function delete($key)
    {
        if (!self::$_sessionStarted) {
            if (isset($_SESSION[$key])) {
                unset($_SESSION[$key]);
            }
        }
    }

    /*
    * @ Return bool
    */
    public static function destroy(): bool
    {
        if (self::$_sessionStarted) {
            setcookie(self::$_cookieName, '', time() - 1, '/');
            session_destroy();
            unset($_SESSION);
            self::$_started = false;
            SessionMapper::deleteSession(self::$_sess_id);
            return true;
        }
        return false;
    }

    /*
    * @ Return bool
    */
    public static function display()
    {
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
    }

    /*
    * @ Return bool
    */
    public static function checkCookie(): bool
    {
        if (!empty($_COOKIE[self::$_cookieName])) {
            if ($_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT'] && $_SESSION['remote_addr'] == $_SERVER['REMOTE_ADDR']) {
                return true;
            } else {
                self::destroy(self::$_sess_id);
                return false;
            }
        }
    }

    public static function sessionRead()
    {
        $result = SessionMapper::getDataWhere( 'session_id',self::$_sess_id);

        // Если данные получены, нам нужно обновить дату
        // доступа к данным:
        if (count($result) > 0) {
            SessionMapper::updateSession('date_touched',self::$_sess_id);

            return html_entity_decode($result['sess_data']);
        } else {
            SessionMapper::addSession(self::$_sess_id);
            return '';
        }
    }

    public static function sessionWrite($data)
    {
        SessionMapper::updateSessionData($data,self::$_sess_id);
    }

    public static function sessGB()
    {
        SessionMapper::sessGB(self::$_lifeTime);
    }
}