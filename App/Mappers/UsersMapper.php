<?php

namespace App\Mappers;

use Core\Database;

/**
 * Class UsersMapper
 * @package App\Mappers
 */
class UsersMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        $sql = "SELECT 
                        id
                        ,login
                        ,password
                        ,email
                        ,first_name
                        ,last_name
                        ,role
                        ,created_at
                        ,updated_at 
                FROM `users`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     * @throws \Exception
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        $sql = "SELECT 
                        id
                        ,login
                        ,password
                        ,email
                        ,first_name
                        ,last_name
                        ,role
                        ,created_at
                        ,updated_at   
                FROM users 
                WHERE $byWhat=:name;";
        return Database::queryData($sql, [':name' => $name]);
    }
}