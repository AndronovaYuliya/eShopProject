<?php

namespace Components\Mappers;

use Components\Core\Database;

class ProductsKeyWordsMapper extends AbstractTableMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'products_key_words'";

    //faker
    public static function addData(): void
    {
        $sql = "INSERT INTO `products_key_words` (id_product,id_key_word,created_at, updated_at) VALUE (:id_product, :id_key_word, NOW(), NOW())";
        $data = Database::addData('fakerProductsKeyWords', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, id_product,id_key_word, created_at, updated_at FROM `products_key_words`;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, id_product,id_key_word, created_at, updated_at FROM `products_key_words` WHERE $byWhat=$name;";
        return Database::getData($sql, self::$_checkTable);
    }
}