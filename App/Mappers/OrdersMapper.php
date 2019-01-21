<?php

namespace App\Mappers;

use Core\Database;

class OrdersMapper extends AbstractTableMapper
{
    //faker
    public static function addFakerData(): void
    {
        $sql = "INSERT INTO `orders` (date,sum, status,ttn,id_client,created_at, updated_at) VALUE (NOW(),:sum,:status, :ttn,:id_client,NOW(), NOW())";
        Database::addFakerData('fakerOrders', $sql, 10);
    }

    public static function query(): array
    {
        $sql = "SELECT id, date,sum, status,ttn, id_client, created_at, updated_at FROM `orders`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, date,sum, status,ttn, id_client, created_at, updated_at FROM `orders` WHERE $byWhat=$name;";
        return Database::query($sql);
    }

    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}