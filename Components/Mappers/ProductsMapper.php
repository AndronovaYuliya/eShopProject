<?php

namespace Components\Mappers;

use Components\Core\Database;

class ProductsMapper extends AbstractTableMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'products'";

    //faker
    public static function addData(): void
    {
        $sql = "INSERT INTO `products` (title, description, price, id_category, created_at, updated_at) VALUE (:title, :description, :price, :id_category, NOW(), NOW())";
        $data = Database::addData('fakerProducts', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, title, description, price, url, sku, id_category, created_at, updated_at FROM `products`;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, title, description, price, url, sku, id_category,  created_at, updated_at FROM `products` WHERE $byWhat=$name;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getProductsWithImg():array
    {
        //to edit!
        $sql="SELECT P.id, P.title, P.description, P.price, P.url, P.sku, I.id, I.file_name 
            FROM products as P, images as I, products_images as PI
            WHERE P.id = PI.id_product AND I.id = PI.id_galary";
        return Database::getData($sql, self::$_checkTable);
    }

}
