<?php

namespace Components\Mappers;

use Components\Core\Database;
use Components\Core\Cache;

class ProductsMapper extends AbstractTableMapper
{
    //faker
    public static function addData(): void
    {
        $sql = "INSERT INTO `products` (title, description, brand,price, count,url, id_category, created_at, updated_at) VALUE (:title, :description,:brand, :price, :count, :url,:id_category, NOW(), NOW())";
        $data = Database::addData('fakerProducts', $sql, 10);
    }

    public static function getFullData(): array
    {
        $cache=new Cache();
        $data=$cache->get('products_full_data');
        if(!$data){
        $sql="SELECT P.id, P.title, P.brand,P.description, P.price, P.url, P.count,P.url,P.updated_at,
                P.id_category, C.title AS category,C.url as url_category,
                GROUP_CONCAT(I.file_name) AS file_name, GROUP_CONCAT(KW.name) AS key_words
                ,GROUP_CONCAT(KW.id) AS id_key_word 
                FROM products AS P
                INNER JOIN products_images AS PI ON PI.id_product=P.id
                INNER JOIN images AS I ON I.id=PI.id_galary
                INNER JOIN categories AS C ON C.id=P.id_category
                INNER JOIN products_key_words AS PKW ON PKW.id_product=P.id
                INNER JOIN key_words AS KW ON KW.id=PKW.id_key_word
                GROUP BY P.id";
        $data= Database::getData($sql);
        $cache->set('products_full_data', $data);
        }
        return $data;
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, title,brand, description, price, url, count, id_category,  created_at, updated_at FROM `products` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }

    public static function getProductWithImg(string $byWhat, string $name):array
    {
        $sql="SELECT result.id,result.title,result.brand, result.description,result.price,result.url, result.count,
              result.id_category,C.url as url_category,C.title as category, 
              GROUP_CONCAT(I.file_name) as file_name, GROUP_CONCAT(KW.name) as key_words
                FROM(
                    SELECT P.id,P.brand, P.title, P.description, P.price, P.url, P.count, P.id_category
                    FROM products AS P
                    WHERE P.$byWhat='$name') AS result 
                INNER JOIN products_images AS PI ON PI.id_product=result.id
                INNER JOIN images AS I ON I.id=PI.id_galary
                INNER JOIN categories as C ON C.id=result.id_category
                INNER JOIN products_key_words as PKW ON PKW.id_product=result.id
                INNER JOIN key_words AS KW ON KW.id=PKW.id_key_word
                GROUP BY result.id";
        return Database::getData($sql);
    }

    public static function getDataByCategory(string $byWhat, string $name)
    {
        $sql="SELECT result.id,result.brand, result.price,  result.count, result.id_category, result.description, 
                result.title,result.url, result.updated_at, result.created_at, C.url as url_category
                ,GROUP_CONCAT(I.file_name) AS file_name FROM 
                    (SELECT P.id,P.brand, P.price, P.count, P.id_category, P.description, P.title,P.url, P.updated_at,
                    P.created_at FROM products AS P WHERE P.$byWhat='$name')AS result 
                 INNER JOIN products_images AS PI ON PI.id_product=result.id
                 INNER JOIN images AS I ON I.id=PI.id_galary
                 INNER JOIN categories AS C ON C.id=result.id_category
                 GROUP BY result.id";
        return Database::getData($sql);
    }

    public static function getDataLike(array $searchKey)
    {
        $search=$searchKey;

        $sql="SELECT P.id,P.title, P.brand, P.description, P.price, P.url, P.count,P.updated_at,P.id_category ,
			GROUP_CONCAT(I.file_name) AS file_name
			FROM key_words AS KW 
			INNER JOIN products_key_words AS PKW ON PKW.id_key_word=KW.id
			INNER JOIN products AS P ON P.id=PKW.id_product 
			INNER JOIN products_images AS PI ON PI.id_product=P.id 
			INNER JOIN images AS I ON I.id=PI.id_galary
            WHERE KW.name LIKE '%".array_shift($search) ."%' ";
        foreach ($search as $key){
            $sql.="OR KW.name LIKE '%".$key."%' ";
        };
        $sql.="GROUP BY P.id
              UNION
            SELECT 
                result.id
                ,result.brand
                ,result.title
                ,result.description
                ,result.price
                ,result.url
                ,result.count
                ,result.updated_at
                ,result.id_category
                ,GROUP_CONCAT(I.file_name) AS file_name
                ,GROUP_CONCAT(KW.name) AS key_words
            FROM
                (SELECT P.id,P.brand,P.title, P.description, P.price, P.url, P.count,P.updated_at,P.id_category 
                FROM products AS P
                WHERE P.title LIKE '%".array_shift($searchKey)."%' ";
        foreach ($searchKey as $key){
            $sql.="OR P.title LIKE '%".$key."%' ";
        };
        $sql.=")AS result
            INNER JOIN products_key_words AS PKW ON PKW.id_product=result.id
            INNER JOIN key_words AS KW ON KW.id=PKW.id_key_word
            INNER JOIN products_images AS PI ON PI.id_product=result.id 
            INNER JOIN images AS I ON I.id=PI.id_galary                
            GROUP BY result.id";
        return Database::getData($sql);
    }

    public static function getData(): array
    {
        $sql="SELECT P.id, P.price,P.brand, P.count, P.id_category, P.description, P.title, P.updated_at, P.created_at
              FROM products AS P";
        return Database::getData($sql);
    }

    public static function getKeyData(string $byWhat, string $searchKey):array
    {
        $sql="SELECT P.id,P.brand, P.title, P.description, P.price, P.url, P.count,P.url,P.updated_at,
		P.id_category,  KW.name, C.title AS category,C.url as url_category,
        GROUP_CONCAT(I.file_name) AS file_name
        FROM key_words AS KW 
        INNER JOIN products_key_words AS PKW ON PKW.id_key_word=KW.id
        INNER JOIN products AS P ON P.id=PKW.id_product
        INNER JOIN categories AS C ON C.id=P.id_category
        INNER JOIN products_images AS PI ON PI.id_product=P.id
        INNER JOIN images AS I ON I.id=PI.id_galary
        WHERE KW.$byWhat='$searchKey'
        GROUP BY P.id";
        return Database::getData($sql);
    }
}
