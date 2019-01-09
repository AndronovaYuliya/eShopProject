<?php

namespace Components\Mappers;

use Components\Core\Database;

class AttributesMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'attributes'";

    public static function getAttributes():array
    {
        $sql = "SELECT id, title, created_at, updated_at FROM `attributes`;";
        $data=Database::getData($sql, self::$_checkTable);
        return $data;
    }

    public static function getAttributeWhere(string $byWhat,string $name)
    {
        $sql = "SELECT id, title, created_at, updated_at FROM `attributes` WHERE $byWhat=$name;";
        $data=Database::getData($sql, self::$_checkTable);
        return $data;
    }

    //faker
    public static function addAttributes()
    {
        $sql = "INSERT INTO `attributes` (title, created_at, updated_at) VALUE (:title, NOW(), NOW())";
        $data = Database::addData('fakerAttributes', $sql, 10);
    }

}