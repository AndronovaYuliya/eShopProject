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
        $sql = "SELECT session_id, date_touched, sess_data FROM sessions WHERE $byWhat = :name";

        return Database::queryData($sql,['name'=>$name]);
    }

    /**
     * @param $attributes
     * @param $sess_id
     * @return array
     */
    public static function updateSession($attributes, $newAttributes, $session_id)
    {
        $sql = "UPDATE sessions SET $attributes = :newAttributes WHERE session_id=:session_id";

        return Database::queryData($sql,["newAttributes"=>$newAttributes,"session_id"=>$session_id]);
    }

    /**
     * @param array $data
     * @param string $sess_id
     * @return array
     */
    public static function addSession(string $data, string $sess_id)
    {
        $data = [
            ':sess_data' => $data,
            ':session_id' => $sess_id
        ];
        $sql = "INSERT INTO sessions (session_id,date_touched, sess_data) values
            (:session_id, NOW(),:sess_data)";

        return Database::addData($sql, $data);
    }

    /**
     * @param $data
     * @param $sess_id
     * @return array
     */
    public static function updateSessionData($data, $sess_id)
    {
        $data = [
            ':sess_data' => $data,
            ':session_id' => $sess_id
        ];
        echo $sess_id;
        $sql = "UPDATE sessions SET date_touched=NOW(), sess_data = :sess_data WHERE  session_id= :sess_id";

        return Database::addData($sql, $data);
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