<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class CategoriesAttributesMapper
 * @package App\Mappers
 */
class CategoriesAttributesMapper extends AbstractTableMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('categories_attributes');
         if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,id_category
                        ,id_attribute
                        ,created_at
                        ,updated_at
                FROM `categories_attributes`;";
        $data = Database::query($sql);
        /*  $cache->set('categories_attributes', $data);
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
                        ,id_category
                        ,id_attribute
                        ,created_at
                        ,updated_at
                FROM `categories_attributes`
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}