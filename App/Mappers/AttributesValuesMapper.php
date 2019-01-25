<?php

namespace App\Mappers;

use Core\Database;

/**
 * Class AttributesValuesMapper
 * @package App\Mappers
 */
class AttributesValuesMapper
{
    /**
     * @throws \Exception
     */
    public static function addFakerData()
    {
        try {
            $sql = "INSERT INTO `attributes_values` (value, created_at, updated_at, attributes_id) VALUE (:value, NOW(), NOW(), :attributes_id)";
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
        $sql = "SELECT id, value, created_at, updated_at, attributes_id FROM `attributes_values`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, value, created_at, updated_at, attributes_id FROM `attributes_values` WHERE $byWhat=$name;";
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