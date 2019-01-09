<?php

namespace Components\Mappers;

use Components\Core\Database;

class CategoriesAttributesMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'categories_attributes'";

    //faker
    public static function addCategoriesAttributes()
    {
        $sql = "INSERT INTO `categories_attributes` (id_category, id_attribute, created_at, updated_at) VALUE (:id_category, :id_attribute, NOW(), NOW())";
        $data = Database::addData('fakerCategoriesAttributes', $sql, 10);
    }
}