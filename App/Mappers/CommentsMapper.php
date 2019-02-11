<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class CommentsMapper
 * @package App\Mappers
 */
class CommentsMapper extends AbstractTableMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        /*$cache = new Cache();
        $data = $cache->get('comments');
        if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,msg
                        ,user
                        ,id_product
                        ,stars
                        ,created_at
                        ,updated_at 
                FROM `comments`;";
        $data = Database::query($sql);
        /*  $cache->set('comments', $data);
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
                        ,msg
                        ,user
                        ,id_product
                        ,stars
                        ,created_at
                        ,updated_at 
                FROM `comments` 
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}