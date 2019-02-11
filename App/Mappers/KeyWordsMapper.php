<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class KeyWordsMapper
 * @package App\Mappers
 */
class KeyWordsMapper extends AbstractTableMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('key_words');
         if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,name
                        ,created_at
                        ,updated_at 
                FROM `key_words`;";
        $data = Database::query($sql);
        /* $cache->set('key_words', $data);
     /*}*/
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
                        ,name
                        ,created_at
                        ,updated_at 
                FROM `key_words` 
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}