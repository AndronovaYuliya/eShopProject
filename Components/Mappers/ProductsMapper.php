<?php

namespace Components\Mappers;

use Components\Core\Database;

class ProductsMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'products'";

    //faker
    public static function addProducts()
    {
        $sql = "INSERT INTO `products` (title, description, price, id_category, created_at, updated_at) VALUE (:title, :description, :price, :id_category, NOW(), NOW())";
        $data = Database::addData('fakerProducts', $sql, 10);
    }

    public static function getProducts():array
    {
        $sql = "SELECT id, title, description, price, url, sku, id_category, created_at, updated_at FROM `products`;";
        $data=Database::getData($sql, self::$_checkTable);
        return $data;
    }
}
