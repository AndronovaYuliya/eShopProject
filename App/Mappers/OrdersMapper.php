<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class OrdersMapper
 * @package App\Mappers
 */
class OrdersMapper extends AbstractTableMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        /*  $cache = new Cache();
          $data = $cache->get('orders');
          if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,date
                        ,sum
                        ,status
                        ,ttn
                        ,id_client
                        ,created_at
                        ,updated_at 
                FROM `orders`;";
        $data = Database::query($sql);
        /*    $cache->set('orders', $data);
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
                        ,date
                        ,sum
                        ,status
                        ,ttn
                        ,id_client
                        ,created_at
                        ,updated_at 
                FROM `orders` 
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}