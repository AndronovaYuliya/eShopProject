<?php

namespace Components\Mappers;

use Components\Core\Database;

class OrdersMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'orders'";

    public static function addOrders():void
    {
        $sql = "INSERT INTO `orders` (date,sum, status,ttn,id_client,created_at, updated_at) VALUE (NOW(),:sum,:status, :ttn,:id_client,NOW(), NOW())";
        Database::addData('fakerOrders', $sql, 10);
    }

    public static function getOrders():array
    {
        $sql = "SELECT id, date,sum, status,ttn, id_client, created_at, updated_at FROM `orders`;";
        $data=Database::getData($sql, self::$_checkTable);
        return $data;
    }
}