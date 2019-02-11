<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class ProductsImagesMapper
 * @package App\Mappers
 */
class ProductsImagesMapper
    /**
     * @return array
     */
    public static function query(): array
    {
        /*  $cache = new Cache();
          $data = $cache->get('products_images');
          if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,id_galary
                        ,id_product
                        ,created_at
                        ,updated_at 
                FROM `products_images`;";
        $data = Database::query($sql);
        /*    $cache->set('products_images', $data);
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
                        ,id_galary
                        ,id_product
                        ,created_at
                        ,updated_at 
                FROM `products_images`
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}