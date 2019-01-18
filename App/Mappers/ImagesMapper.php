<?php

namespace App\Mappers;

use Components\Core\Database;

class ImagesMapper extends AbstractTableMapper
{
    public static function addData(): void
    {
        $sql = "INSERT INTO `images` (file_name, created_at, updated_at) VALUE (:file_name, NOW(), NOW())";
        Database::addData('fakerImages', $sql, 20);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, file_name,created_at, updated_at FROM `images`;";
        return Database::getData($sql);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, file_name, created_at, updated_at FROM `images` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }
}