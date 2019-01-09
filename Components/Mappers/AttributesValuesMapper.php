<?php

namespace Components\Mappers;

use Components\Core\Database;

class AttributesValuesMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'attributes_values'";

    //faker
    public static function addAttributesValues():void
    {
        $sql = "INSERT INTO `attributes_values` (value, created_at, updated_at, attributes_id) VALUE (:value, NOW(), NOW(), :attributes_id)";
        $data = Database::addData('fakerAttributesValues', $sql, 10);
    }
}