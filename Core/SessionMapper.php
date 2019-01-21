<?php

namespace Core;

use Core\Database;

/**
 * Class SessionMapper
 * @package Core
 */
abstract class SessionMapper
{
    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        $sql = "SELECT * FROM sessions WHERE $byWhat = $name";
        return Database::query($sql);
    }

    /**
     * @param $attributes
     * @param $sess_id
     * @return array
     */
    public static function updateSession($attributes, $sess_id)
    {
        $sql = "UPDATE sessions SET $attributes = NOW() WHERE session_id=$sess_id";
        return Database::query($sql);
    }

    /**
     * @param $sess_id
     * @return array
     */
    public static function addSession($sess_id)
    {
        $sql = "INSERT INTO sessions SET session_id=$sess_id, date_touched=NOW()";
        return Database::query($sql);
    }

    /**
     * @param $data
     * @param $sess_id
     * @return array
     */
    public static function updateSessionData($data, $sess_id)
    {
        $sql = "UPDATE sessions SET date_touched=NOW(), sess_data = "
            . htmlentities($data, ENT_QUOTES) . " WHERE  session_id= $sess_id";
        return Database::query($sql);
    }

    /**
     * @param $sess_id
     * @return array
     */
    public static function deleteSession($sess_id)
    {
        $sql = "DELETE FROM sessions WHERE session_id = $sess_id";
        return Database::query($sql);
    }

    /**
     * @param $lifeTime
     * @return array
     */
    public static function sessGB($lifeTime)
    {
        $sql = "DELETE FROM sessions WHERE  date_touched + $lifeTime < NOW()";
        return Database::query($sql);
    }
}
