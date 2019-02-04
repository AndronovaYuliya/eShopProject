<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class ImagesMapper
 * @package App\Mappers
 */
class ImagesMapper extends AbstractTableMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('images');
         if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,file_name
                        ,created_at
                        ,updated_at 
                FROM `images`;";
        $data = Database::query($sql);
        /*   $cache->set('images', $data);
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
                        ,file_name
                        ,created_at
                        ,updated_at 
                FROM `images` 
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}