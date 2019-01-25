<?php

namespace App\Mappers;

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
        $sql = "SELECT 
                        id
                        ,id_product
                        ,id_key_word
                        ,created_at
                        ,updated_at 
                FROM `products_key_words`;";
        return Database::query($sql);
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

    /**
     * @return void
     */
    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}