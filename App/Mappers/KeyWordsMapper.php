<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class KeyWordsMapper
 * @package App\Mappers
 */
class KeyWordsMapper extends AbstractTableMapper
{
    /**
     * @return void
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `key_words` (name, created_at, updated_at) 
                                      VALUE (:name, NOW(), NOW())";
            Database::addFakerData('fakerKeyWords', $sql, 20);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table key_words: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('key_words');
         if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,name
                        ,created_at
                        ,updated_at 
                FROM `key_words`;";
        $data = Database::query($sql);
        /* $cache->set('key_words', $data);
     /*}*/
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT 
                        id
                        ,name
                        ,created_at
                        ,updated_at 
                FROM `key_words` 
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}