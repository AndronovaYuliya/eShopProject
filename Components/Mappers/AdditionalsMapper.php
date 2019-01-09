<?php

namespace Components\Mappers;

use Components\Core\Database;

class AdditionalsMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'additionals'";

    public static function addAdditionals():void
    {
        $sql = "INSERT INTO `additionals` (id_product, id_order, count, price, created_at, updated_at) VALUE (:id_product, :id_order, :count, :price, NOW(), NOW())";
        Database::addData('fakerAdditionals', $sql, 10);
    }
}