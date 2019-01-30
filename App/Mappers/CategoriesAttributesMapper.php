<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class CategoriesAttributesMapper
 * @package App\Mappers
 */
class CategoriesAttributesMapper extends AbstractTableMapper
{
    /**
     * @return void
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `categories_attributes` (id_category, id_attribute, created_at, updated_at) 
                                                  VALUE (:id_category, :id_attribute, NOW(), NOW())";
            Database::addFakerData('fakerCategoriesAttributes', $sql, 10);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table categories_attributes: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('categories_attributes');
         if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,id_category
                        ,id_attribute
                        ,created_at
                        ,updated_at
                FROM `categories_attributes`;";
        $data = Database::query($sql);
        /*  $cache->set('categories_attributes', $data);
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
                        ,id_category
                        ,id_attribute
                        ,created_at
                        ,updated_at
                FROM `categories_attributes`
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}