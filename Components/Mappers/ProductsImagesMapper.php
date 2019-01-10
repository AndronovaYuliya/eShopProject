<?php

namespace Components\Mappers;

use Components\Core\Database;

class ProductsImagesMapper extends AbstractTableMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'products_images'";

    public static function addData(): void
    {
        $sql = "INSERT INTO `products_images` (id_galary, id_product, created_at, updated_at) VALUE (:id_galary, :id_product,NOW(), NOW())";
        Database::addData('fakerProductsImages', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, id_galary,id_product, created_at, updated_at FROM `products_images`;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, id_galary,id_product, created_at, updated_at FROM `products_images` WHERE $byWhat=$name;";
        return Database::getData($sql, self::$_checkTable);
    }
}