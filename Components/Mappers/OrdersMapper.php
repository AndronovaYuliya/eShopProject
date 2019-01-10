<?php

namespace Components\Mappers;

use Components\Core\Database;

class OrdersMapper extends AbstractTableMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'orders'";

    //faker
    public static function addData():void
    {
        $sql = "INSERT INTO `orders` (date,sum, status,ttn,id_client,created_at, updated_at) VALUE (NOW(),:sum,:status, :ttn,:id_client,NOW(), NOW())";
        Database::addData('fakerOrders', $sql, 10);
    }

    public static function getData():array
    {
        $sql = "SELECT id, date,sum, status,ttn, id_client, created_at, updated_at FROM `orders`;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getDataWhere(string $byWhat,string $name)
    {
        $sql = "SELECT id, date,sum, status,ttn, id_client, created_at, updated_at FROM `orders` WHERE $byWhat=$name;";
        return Database::getData($sql, self::$_checkTable);
    }
}