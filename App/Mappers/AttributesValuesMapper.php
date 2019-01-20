<?php

namespace App\Mappers;

use Core\Database;

class AttributesValuesMapper extends AbstractTableMapper
{
    //faker
    public static function addFakerData(): void
    {
        $sql = "INSERT INTO `attributes_values` (value, created_at, updated_at, attributes_id) VALUE (:value, NOW(), NOW(), :attributes_id)";
        Database::addFakerData('fakerAttributesValues', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, value, created_at, updated_at, attributes_id FROM `attributes_values`;";
        return Database::getData($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, value, created_at, updated_at, attributes_id FROM `attributes_values` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }

    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}