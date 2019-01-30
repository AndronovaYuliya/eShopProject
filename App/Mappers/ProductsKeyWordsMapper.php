<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class ProductsKeyWordsMapper
 * @package App\Mappers
 */
class ProductsKeyWordsMapper extends AbstractTableMapper
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `products_key_words` (id_product,id_key_word,created_at, updated_at) 
                                              VALUE (:id_product, :id_key_word, NOW(), NOW())";
            Database::addFakerData('fakerProductsKeyWords', $sql, 20);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table products_key_words: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        /*  $cache = new Cache();
          $data = $cache->get('products_key_words');
          if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,id_product
                        ,id_key_word
                        ,created_at
                        ,updated_at 
                FROM `products_key_words`;";
        $data = Database::query($sql);
        /* $cache->set('products_key_words', $data);
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
                        ,id_product
                        ,id_key_word
                        ,created_at
                        ,updated_at 
                FROM `products_key_words`
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}