<?php

namespace Components\Mappers;

use Components\Core\Database;

class CategoriesMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'categories'";

    public static function getCategories():array
    {
        $sql = "SELECT id, title, description, parent_id, created_at, updated_at FROM `categories`;";
        $data=Database::getData($sql, self::$_checkTable);
        return $data;
    }

    public static function getCategoryWhere(string $byWhat,string $name)
    {
        $sql = "SELECT id, title, created_at, updated_at FROM `categories` WHERE $byWhat=$name;";
        $data=Database::getData($sql, self::$_checkTable);
        return $data;
    }

    public static function addCategories():void
    {
        $sql = "INSERT INTO `categories` (title, description, parent_id, created_at,updated_at) VALUE (:title, :description, :parent_id, NOW(),NOW())";
        Database::addData('fakerCategories', $sql, 10);
    }


}