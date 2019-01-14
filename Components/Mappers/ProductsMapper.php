<?php

namespace Components\Mappers;

use Components\Core\Database;

class ProductsMapper extends AbstractTableMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'products'";

    //faker
    public static function addData(): void
    {
        $sql = "INSERT INTO `products` (title, description, price, count, id_category, created_at, updated_at) VALUE (:title, :description, :price, :count, :id_category, NOW(), NOW())";
        $data = Database::addData('fakerProducts', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, title, description, price, url, count, id_category, created_at, updated_at FROM `products`;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, title, description, price, url, count, id_category,  created_at, updated_at FROM `products` WHERE $byWhat=$name;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getProductsWithImg():array
    {
        $sql="SELECT P.id, P.title, P.description, P.price, P.url, P.count,P.updated_at,P.id_category, C.title AS category,
                GROUP_CONCAT(I.file_name) AS file_name, GROUP_CONCAT(KW.name) AS key_words
                FROM products AS P
                INNER JOIN products_images AS PI ON PI.id_product=P.id
                INNER JOIN images AS I ON I.id=PI.id_galary
                INNER JOIN categories AS C ON C.id=P.id_category
                INNER JOIN products_key_words AS PKW ON PKW.id_product=P.id
                INNER JOIN key_words AS KW ON KW.id=PKW.id_key_word
                GROUP BY P.id";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getProductWithImg(string $byWhat, string $name):array
    {
        $sql="SELECT result.id,result.title, result.description,result.price,result.url, result.count,result.id_category,
          C.title as category, GROUP_CONCAT(I.file_name) as file_name, GROUP_CONCAT(KW.name) as key_words
                FROM(
                    SELECT P.id, P.title, P.description, P.price, P.url, P.count, P.id_category
                    FROM products AS P
                    WHERE P.$byWhat=$name) AS result 
                INNER JOIN products_images AS PI ON PI.id_product=result.id
                INNER JOIN images AS I ON I.id=PI.id_galary
                INNER JOIN categories as C ON C.id=result.id_category
                INNER JOIN products_key_words as PKW ON PKW.id_product=result.id
                INNER JOIN key_words AS KW ON KW.id=PKW.id_key_word
                GROUP BY result.id";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getDataByCategory(string $byWhat, string $name)
    {
        $sql="SELECT result.id, result.price,  result.count, result.id_category, result.description, 
                result.title, result.updated_at, result.created_at, GROUP_CONCAT(I.file_name) AS file_name FROM 
                    (SELECT P.id, P.price, P.count, P.id_category, P.description, P.title, P.updated_at, 
                    P.created_at FROM products AS P WHERE P.$byWhat=$name)AS result 
                 INNER JOIN products_images AS PI ON PI.id_product=result.id
                 INNER JOIN images AS I ON I.id=PI.id_galary
                 GROUP BY result.id";
        return Database::getData($sql, self::$_checkTable);
    }
}
