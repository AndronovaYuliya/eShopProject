<?php

namespace App\Mappers;

use Core\Database;

class AdditionalsMapper extends AbstractTableMapper
{
    public static function addFakerData(): void
    {
        $sql = "INSERT INTO `additionals` (id_product, id_order, count, price, created_at, updated_at) VALUE (:id_product, :id_order, :count, :price, NOW(), NOW())";
        Database::addFakerData('fakerAdditionals', $sql, 10);
    }

    public static function query(): array
    {
        $sql = "SELECT id, id_product, id_order,count,price, created_at, updated_at FROM `additionals`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, id_product, id_order,count,price, created_at, updated_at FROM `additionals` WHERE $byWhat=$name;";
        return Database::query($sql);
    }

    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}