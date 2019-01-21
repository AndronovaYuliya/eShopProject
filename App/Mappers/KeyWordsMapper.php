<?php

namespace App\Mappers;

use Core\Database;

class KeyWordsMapper extends AbstractTableMapper
{
    //faker
    public static function addFakerData(): void
    {
        $sql = "INSERT INTO `key_words` (name, created_at, updated_at) VALUE (:name, NOW(), NOW())";
        Database::addFakerData('fakerKeyWords', $sql, 20);
    }

    public static function query(): array
    {
        $sql = "SELECT id, name, created_at, updated_at FROM `key_words`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, name, created_at, updated_at FROM `key_words` WHERE $byWhat=$name;";
        return Database::query($sql);
    }

    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}