<?php

namespace Components\Mappers;

use Components\Core\Database;

class KeyWordsMapper extends AbstractTableMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'key_words'";

    //faker
    public static function addData(): void
    {
        $sql = "INSERT INTO `key_words` (name, created_at, updated_at) VALUE (:name, NOW(), NOW())";
        Database::addData('fakerKeyWords', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, name, created_at, updated_at FROM `key_words`;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, name, created_at, updated_at FROM `key_words` WHERE $byWhat=$name;";
        return Database::getData($sql, self::$_checkTable);
    }
}