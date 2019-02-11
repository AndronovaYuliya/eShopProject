<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class AttributesValuesMapper
 * @package App\Mappers
 */
class AttributesValuesMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('attributes_values');
         if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,value
                        ,created_at
                        ,updated_at
                        ,attributes_id 
                FROM `attributes_values`;";
        $data = Database::query($sql);
        /*$cache->set('attributes_values', $data);
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
                        ,value
                        ,created_at
                        ,updated_at
                        ,attributes_id 
                FROM `attributes_values`
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}
