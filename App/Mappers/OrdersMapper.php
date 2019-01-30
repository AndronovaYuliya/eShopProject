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
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `orders` (date, sum, status,ttn,id_client,created_at, updated_at) 
                                    VALUE (NOW(),:sum,:status, :ttn,:id_client,NOW(), NOW())";
            Database::addFakerData('fakerOrders', $sql, 10);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table orders: {$e->getTraceAsString()}"], 500);
        }
    }

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