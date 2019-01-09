<?php

namespace Components\Mappers;

use Components\Core\Database;

class ImagesMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'images'";

    public static function addImages():void
    {
        $sql = "INSERT INTO `images` (file_name, created_at, updated_at) VALUE (:file_name, NOW(), NOW())";
        Database::addData('fakerImages', $sql, 10);
    }

    public static function getImages():array
    {
        $sql = "SELECT id, file_name,created_at, updated_at FROM `images`;";
        $data=Database::getData($sql, self::$_checkTable);
        return $data;
    }
}