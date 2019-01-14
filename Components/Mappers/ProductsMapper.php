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
        $sql="SELECT P.id, P.title, P.description, P.price, P.url, P.count,P.updated_at,C.title as category, group_concat(I.file_name) as file_name
            FROM products as P
            inner join products_images as PI on PI.id_product=P.id
            inner join images as I on I.id=PI.id_galary
            inner join categories as C on C.id=P.id_category
            group by P.id
            order by P.updated_at";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getProductWithImg(string $byWhat, string $name):array
    {
        $sql="	SELECT result.id,result.title, result.description,result.price,result.url, result.count, C.title as category, GROUP_CONCAT(I.file_name) as file_name, GROUP_CONCAT(KW.name) as key_words
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
}
