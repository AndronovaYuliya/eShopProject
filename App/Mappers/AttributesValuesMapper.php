<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class AttributesValuesMapper
 * @package App\Mappers
 */
class AttributesValuesMapper extends AbstractTableMapper
{
    /**
     * @return void
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `attributes_values` (value, created_at, updated_at, attributes_id) 
                                              VALUE (:value, NOW(), NOW(), :attributes_id)";
            Database::addFakerData('fakerAttributesValues', $sql, 10);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table attributes_values: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('attributes_values');
         if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,value
                        ,created_at
                        ,updated_at
                        ,attributes_id 
                FROM `attributes_values`;";
        $data = Database::query($sql);
        /*$cache->set('attributes_values', $data);
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
                        ,value
                        ,created_at
                        ,updated_at
                        ,attributes_id 
                FROM `attributes_values`
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}
