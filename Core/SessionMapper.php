<?php

namespace Core;

use Core\Database;

/**
 * Class SessionMapper
 * @package Core
 */
class SessionMapper
{
    /**
     * @param $byWhat
     * @param $name
     * @return array
     * @throws \Exception
     */
    public static function getDataWhere($byWhat, $name): array
    {
        try {
            $sql = "SELECT session_id, date_touched, sess_data FROM sessions WHERE $byWhat = :name";
        } catch (PDOException $e) {
            throw new \Exception(["Faker table orders: {$e->getTraceAsString()}"], 500);
        }
        return Database::queryData($sql, ['name' => $name]);
    }

    /**
     * @param $data
     * @param $sess_id
     * @throws \Exception
     */
    public static function addSession($data, $sess_id)
    {
        $datas = [
            ':sess_data' => $data,
            ':session_id' => $sess_id
        ];
        $sql = "INSERT INTO sessions (session_id,date_touched, sess_data) values
            (:session_id, NOW(),:sess_data)";

        return Database::addData($sql, $datas);
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
     * @param $data
     * @param $sess_id
     * @throws \Exception
     */
    public static function updateSessionData($data, $sess_id): void
    {
        $datas = [
            ':sess_data' => $data,
            ':session_id' => $sess_id
        ];

        $sql = "UPDATE sessions SET date_touched=NOW(), sess_data = :sess_data WHERE  session_id= :sess_id";

        Database::addData($sql, $datas);
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

    /**
     * @return array
     */
    public static function query(): array
    {
        $cache = new Cache();
        $data = $cache->get('sessions');
        if (!$data) {
            $sql = "SELECT 
                        id
                        ,session_id
                        ,date_touched
                        ,sess_data 
                FROM `sessions`;";
            $data = Database::query($sql);
            $cache->set('sessions', $data);
        }
        return $data;
    }
}