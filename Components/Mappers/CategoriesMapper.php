<?php

namespace Components\Mappers;

use Components\Core\Database;

class CategoriesMapper extends AbstractTableMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'categories'";

    public static function addData(): void
    {
        $sql = "INSERT INTO `categories` (title, description, parent_id, created_at,updated_at) VALUE (:title, :description, :parent_id, NOW(),NOW())";
        Database::addData('fakerCategories', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, title, description, parent_id, created_at, updated_at FROM `categories`;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, title, created_at, updated_at FROM `categories` WHERE $byWhat=$name;";
        return Database::getData($sql, self::$_checkTable);
    }


}