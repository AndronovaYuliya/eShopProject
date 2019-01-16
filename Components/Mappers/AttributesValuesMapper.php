<?php

namespace Components\Mappers;

use Components\Core\Database;

class AttributesValuesMapper extends AbstractTableMapper
{
    //faker
    public static function addData(): void
    {
        $sql = "INSERT INTO `attributes_values` (value, created_at, updated_at, attributes_id) VALUE (:value, NOW(), NOW(), :attributes_id)";
        Database::addData('fakerAttributesValues', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, value, created_at, updated_at, attributes_id FROM `attributes_values`;";
        return Database::getData($sql);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, value, created_at, updated_at, attributes_id FROM `attributes_values` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }
}