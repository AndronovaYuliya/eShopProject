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
     * @throws \Exception
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        $sql = "SELECT session_id, date_touched, sess_data FROM sessions WHERE $byWhat = :name";

        return Database::queryData($sql, ['name' => $name]);
    }

    /**
     * @param $attributes
     * @param $newAttributes
     * @param $session_id
     * @return array
     * @throws \Exception
     */
    public static function updateSession($attributes, $newAttributes, $session_id): array
    {
        $sql = "UPDATE sessions SET $attributes = :newAttributes WHERE session_id=:session_id";

        return Database::queryData($sql, ["newAttributes" => $newAttributes, "session_id" => $session_id]);
    }

    /**
     * @param string $data
     * @param string $sess_id
     * @throws \Exception
     */
    public static function addSession(string $data, string $sess_id): void
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
     * @throws \Exception
     */
    public static function updateSessionData($data, $sess_id): void
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
    public static function deleteSession($sess_id): array
    {
        $sql = "DELETE FROM sessions WHERE session_id = $sess_id";
        return Database::query($sql);
    }

    /**
     * @param $session_id
     * @return array
     * @throws \Exception
     */
    public static function sessionGB($session_id): array
    {
        $sql = "DELETE FROM sessions WHERE  session_id =:session_id";
        return Database::queryData($sql, [':session_id' => $session_id]);
    }

}