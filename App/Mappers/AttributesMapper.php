<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class AttributesMapper
 * @package App\Mappers
 */
class AttributesMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('attributes');
         if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,title
                        ,created_at
                        ,updated_at 
                FROM `attributes`;";
        $data = Database::query($sql);
        /* $cache->set('attributes', $data);
     }*/
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT 
                        id
                        ,title
                        ,created_at
                        ,updated_at 
                FROM `attributes` 
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}
