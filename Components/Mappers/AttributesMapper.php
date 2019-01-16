<?php

namespace Components\Mappers;

use Components\Core\Database;

class AttributesMapper extends AbstractTableMapper
{
    //faker
    public static function addData():void
    {
        $sql = "INSERT INTO `attributes` (title, created_at, updated_at) VALUE (:title, NOW(), NOW())";
        Database::addData('fakerAttributes', $sql, 10);
    }

    public static function getData():array
    {
        $sql = "SELECT id, title, created_at, updated_at FROM `attributes`;";
        return Database::getData($sql);
    }

    public static function getDataWhere(string $byWhat,string $name)
    {
        $sql = "SELECT id, title, created_at, updated_at FROM `attributes` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }
}