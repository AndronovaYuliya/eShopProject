<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class CategoriesMapper
 * @package App\Mappers
 */
class CategoriesMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('categories');
         if (!$data) {*/
        $sql = "SELECT 
                            id
                            ,title
                            ,description
                            ,parent_id
                            ,alias
                            ,created_at
                            ,updated_at
                    FROM `categories`;";
        $data = Database::query($sql);
        /*   $cache->set('categories', $data);
       }*/
        return $data;
    }

    /**
     * @param string $byWhat
     * @param $name
     * @return array
     * @throws \Exception
     */
    public static function getDataWhere(string $byWhat, $name): array
    {
        $sql = "SELECT 
                        id
                        ,title
                        ,description
                        ,parent_id
                        ,alias
                        ,created_at
                        ,updated_at
                FROM `categories` 
                WHERE $byWhat=:name;";
        return Database::queryData($sql, [':name' => $name]);
    }
}