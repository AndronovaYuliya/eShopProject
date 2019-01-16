<?php

namespace Components\Mappers;

use Components\Core\Database;

class KeyWordsMapper extends AbstractTableMapper
{
    //faker
    public static function addData(): void
    {
        $sql = "INSERT INTO `key_words` (name, created_at, updated_at) VALUE (:name, NOW(), NOW())";
        Database::addData('fakerKeyWords', $sql, 20);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, name, created_at, updated_at FROM `key_words`;";
        return Database::getData($sql);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, name, created_at, updated_at FROM `key_words` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }
}