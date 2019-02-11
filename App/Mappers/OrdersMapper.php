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

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     * @throws \Exception
     */
    public static function getDataByClient($byWhat, $name)
    {
        $sql = "SELECT O.id,O.date, O.sum, O.ttn, O.updated_at,O.status FROM
                    (SELECT id from clients WHERE {$byWhat}=:name)AS result
                INNER JOIN orders AS O ON O.id_client=result.id;";
        return Database::queryData($sql, [':name' => $name]);
    }

    /**
     * @param array $attributes
     * @return mixed
     * @throws \Exception
     */
    public static function addOrder(array $attributes)
    {
        $sql = "INSERT INTO `orders` (date, sum, id_client, created_at, updated_at) 
                               VALUE (NOW(), :sum, :id_client, NOW(), NOW())";
        Database::addData($sql, $attributes);
        return Database::query('SELECT LAST_INSERT_ID();')[0]['LAST_INSERT_ID()'];
    }

    /**
     * @param array $order
     * @param $orderId
     * @throws \Exception
     */
    public static function saveOrderProduct(array $order, $orderId): void
    {
        $attributes = [];
        foreach ($order as $key => $item) {
            if ($key != 0) {
                $sql = "INSERT INTO `additionals`
                        (id_product, id_order, count, price, created_at, updated_at)
                            VALUE (:id_product, :id_order, :count, :price, NOW(), NOW())";
                $attributes[':id_product'] = $key;
                $attributes[':id_order'] = $orderId;
                $attributes[':count'] = (int)$item['qty'];
                $attributes[':price'] = $item['sum'];
                Database::addData($sql, $attributes);
            }
        }
    }

    /**
     * @param $byWhat
     * @param $name
     * @return array
     * @throws \Exception
     */
    public static function getOrderDetail($byWhat, $name): array
    {
        $sql = "SELECT A.id_product, A.count, A.price,P.alias,P.brand,P.title FROM additionals AS A 
            LEFT JOIN products AS P ON P.id=A.id_product
            WHERE A.{$byWhat}=:name";
        return Database::queryData($sql, [':name' => $name]);
    }
}