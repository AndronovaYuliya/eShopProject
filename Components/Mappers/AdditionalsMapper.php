<?php

namespace Components\Mappers;

use Components\Core\Database;

class AdditionalsMapper extends AbstractTableMapper
{
    public static function addData(): void
    {
        $sql = "INSERT INTO `additionals` (id_product, id_order, count, price, created_at, updated_at) VALUE (:id_product, :id_order, :count, :price, NOW(), NOW())";
        Database::addData('fakerAdditionals', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, id_product, id_order,count,price, created_at, updated_at FROM `additionals`;";
        return Database::getData($sql);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, id_product, id_order,count,price, created_at, updated_at FROM `additionals` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }
}