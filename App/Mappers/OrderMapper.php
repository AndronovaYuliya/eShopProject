<?php

namespace App\Mappers;

use Core\Database;

class OrderMapper extends AbstractTableMapper
{

    /**
     * @return array
     */
    protected static function query(): array
    {

    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return mixed
     */
    protected static function getDataWhere(string $byWhat, string $name)
    {

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
}