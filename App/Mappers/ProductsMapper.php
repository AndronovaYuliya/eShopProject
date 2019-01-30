<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class ProductsMapper
 * @package App\Mappers
 */
class ProductsMapper extends AbstractTableMapper
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `products` (title, description, brand, alias, price, old_price
                                            ,count,url, id_category, created_at, updated_at) 
                                    VALUE (:title, :description,:brand,:alias,:price,:old_price
                                            ,:count, :url,:id_category, NOW(), NOW())";
            Database::addFakerData('fakerProducts', $sql, 10);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table products: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @return array
     */
    public static function getFullData(): array
    {
        /*   $cache = new Cache();
           $data = $cache->get('products_full_data');
           if (!$data) {*/
        $sql = "SELECT 
                            P.id
                            ,P.title
                            ,P.brand
                            ,P.alias
                            ,P.description
                            ,P.price
                            ,P.old_price
                            ,P.url
                            ,P.count
                            ,P.url
                            ,P.updated_at
                            ,P.id_category
                            ,C.title AS category
                            ,C.alias AS category_alias
                            ,GROUP_CONCAT(I.file_name) AS file_name
                            ,GROUP_CONCAT(KW.name) AS key_words
                            ,GROUP_CONCAT(KW.id) AS id_key_word 
                    FROM products AS P
                    INNER JOIN products_images AS PI ON PI.id_product=P.id
                    INNER JOIN images AS I ON I.id=PI.id_galary
                    INNER JOIN categories AS C ON C.id=P.id_category
                    INNER JOIN products_key_words AS PKW ON PKW.id_product=P.id
                    INNER JOIN key_words AS KW ON KW.id=PKW.id_key_word
                    GROUP BY P.id";
        $data = Database::query($sql);
        /*  $cache->set('products_full_data', $data);
      }*/
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT
                        id
                        ,title
                        ,brand
                        ,alias
                        ,description
                        ,price
                        ,old_price
                        ,url
                        ,count
                        ,id_category
                        ,created_at
                        ,updated_at 
                FROM `products` 
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getProductWithImg(string $byWhat, string $name): array
    {
        $sql = "SELECT P.id,P.brand,P.alias,P.title,P.description
            ,P.price,P.old_price,P.url,P.count,P.id_category
            ,C.title as category,C.alias as category_alias
            ,P.id_category,GROUP_CONCAT(I.file_name) as file_name
            ,GROUP_CONCAT(KW.name) as key_words FROM products AS P
            LEFT JOIN products_images AS PI ON PI.id_product=P.id
            LEFT JOIN images AS I ON I.id=PI.id_galary
            LEFT JOIN categories as C ON C.id=P.id_category
            LEFT JOIN products_key_words as PKW ON PKW.id_product=P.id
            LEFT JOIN key_words AS KW ON KW.id=PKW.id_key_word
            WHERE P.{$byWhat}='{$name}'  
            GROUP BY P.id";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataByCategory(string $byWhat, string $name)
    {
        $sql = "SELECT P.id,P.brand,P.alias,P.price,P.old_price
,P.count,P.id_category,P.description,P.title
,P.url,P.updated_at,P.created_at ,result.id, result.category_alias,GROUP_CONCAT(I.file_name) AS file_name 
	from(SELECT C.id, C.alias as category_alias from categories as C WHERE $byWhat='$name')as result
INNER JOIN products AS P ON P.id_category=result.id
LEFT JOIN products_images AS PI ON PI.id_product=P.id
LEFT JOIN images AS I ON I.id=PI.id_galary
GROUP BY P.id";
        return Database::query($sql);
    }

    /**
     * @param array $searchKey
     * @return array
     */
    public static function getDataLike(array $searchKey)
    {
        $search = $searchKey;
        $sql = "SELECT 
                         P.id
                        ,P.brand
                        ,P.title
                        ,P.description
                        ,P.price
                        ,P.alias
                        ,P.count
                        ,P.updated_at
                        ,P.id_category
                        ,GROUP_CONCAT(I.file_name) AS file_name
                        ,GROUP_CONCAT(KW.name) AS key_words
                FROM key_words AS KW 
                INNER JOIN products_key_words AS PKW ON PKW.id_key_word=KW.id 
                INNER JOIN products AS P ON P.id=PKW.id_product 
                INNER JOIN products_images AS PI ON PI.id_product=P.id 
                INNER JOIN images AS I ON I.id=PI.id_galary 
                WHERE KW.name LIKE '%" . array_shift($search) . "%' ";
        foreach ($search as $key) {
            $sql .= "OR KW.name LIKE '%" . $key . "%' ";
        };
        $sql .= "GROUP BY P.id
              UNION
            SELECT 
                result.id
                ,result.brand
                ,result.title
                ,result.description
                ,result.price
                ,result.alias
                ,result.count
                ,result.updated_at
                ,result.id_category
                ,GROUP_CONCAT(I.file_name) AS file_name
                ,GROUP_CONCAT(KW.name) AS key_words
            FROM
                (SELECT P.id,P.brand,P.title, P.description, P.price, P.alias, P.count,P.updated_at,P.id_category 
                FROM products AS P
                WHERE P.title LIKE '%" . array_shift($searchKey) . "%' ";
        foreach ($searchKey as $key) {
            $sql .= "OR P.title LIKE '%" . $key . "%' ";
        };
        $sql .= ")AS result
            INNER JOIN products_key_words AS PKW ON PKW.id_product=result.id
            INNER JOIN key_words AS KW ON KW.id=PKW.id_key_word
            INNER JOIN products_images AS PI ON PI.id_product=result.id 
            INNER JOIN images AS I ON I.id=PI.id_galary                
            GROUP BY result.id";
        return Database::query($sql);
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        $cache = new Cache();
        $data = $cache->get('products');
        if (!$data) {
            $sql = "SELECT 
                        P.id
                        ,P.price
                        ,P.old_price
                        ,P.brand
                        ,P.alias
                        ,P.count
                        ,P.id_category
                        ,P.description
                        ,P.title
                        ,P.updated_at
                        ,P.created_at
                FROM products AS P";
            $data = Database::query($sql);
            $cache->set('products', $data);
        }
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $searchKey
     * @return array
     */
    public static function getKeyData(string $byWhat, string $searchKey): array
    {
        $sql = "SELECT 
                        P.id
                        ,P.brand
                        ,P.alias
                        ,P.title
                        ,P.description
                        ,P.price
                        ,P.old_price
                        ,P.old_price
                        ,P.url
                        ,P.count
                        ,P.url
                        ,P.updated_at
                        ,P.id_category
                        ,KW.name
                        ,C.title AS category
                        ,C.alias AS category_alias,
                        GROUP_CONCAT(I.file_name) AS file_name
                FROM key_words AS KW 
                INNER JOIN products_key_words AS PKW ON PKW.id_key_word=KW.id
                INNER JOIN products AS P ON P.id=PKW.id_product
                INNER JOIN categories AS C ON C.id=P.id_category
                INNER JOIN products_images AS PI ON PI.id_product=P.id
                INNER JOIN images AS I ON I.id=PI.id_galary
                WHERE KW.$byWhat='$searchKey'
                GROUP BY P.id";
        return Database::query($sql);
    }
}
