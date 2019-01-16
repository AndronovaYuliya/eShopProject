<?php

namespace Components\Mappers;

use Components\Core\Database;

class CategoriesMapper extends AbstractTableMapper
{
    public static function addData(): void
    {
        $sql = "INSERT INTO `categories` (title, description, parent_id, url, created_at,updated_at) VALUE (:title, :description, :parent_id, :url, NOW(),NOW())";
        Database::addData('fakerCategories', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, title, description, parent_id,url, created_at, updated_at FROM `categories`;";
        return Database::getData($sql);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, title,url, created_at, updated_at FROM `categories` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }


}