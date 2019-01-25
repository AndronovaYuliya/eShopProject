<?php

namespace App\Mappers;

use Core\Database;

/**
 * Class KeyWordsMapper
 * @package App\Mappers
 */
class KeyWordsMapper
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `key_words` (name, created_at, updated_at) VALUE (:name, NOW(), NOW())";
            Database::addFakerData('fakerKeyWords', $sql, 20);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table key_words: {$e->getTraceAsString()}"],500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        $sql = "SELECT id, name, created_at, updated_at FROM `key_words`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, name, created_at, updated_at FROM `key_words` WHERE $byWhat=$name;";
        return Database::query($sql);
    }

    /**
     * @return void
     */
    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}