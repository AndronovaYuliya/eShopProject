<?php

namespace App\Mappers;

use Core\Database;

class CategoriesAttributesMapper extends AbstractTableMapper
{
    //faker
    public static function addFakerData(): void
    {
        $sql = "INSERT INTO `categories_attributes` (id_category, id_attribute, created_at, updated_at) VALUE (:id_category, :id_attribute, NOW(), NOW())";
        Database::addFakerData('fakerCategoriesAttributes', $sql, 10);
    }

    public static function query(): array
    {
        $sql = "SELECT id, id_category, id_attribute, created_at, updated_at FROM `categories_attributes`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, id_category,id_attribute, created_at, updated_at FROM `categories_attributes` WHERE $byWhat=$name;";
        return Database::query($sql);
    }

    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}