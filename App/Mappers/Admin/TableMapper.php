<?php

namespace App\Mappers\Admin;

use Core\Database;

/**
 * Class TableMapper
 * @package App\Mappers\Admin
 */
class TableMapper
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
     * @return array
     */
    public static function getTables(): array
    {
        $sql = "SHOW tables";
        return Database::query($sql);
    }
}