<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class CategoriesMapper
 * @package App\Mappers
 */
class CategoriesMapper
{
    /**
     * @throws \Exception
     */
    public static function addFakerData()
    {
        try {
            $sql = "INSERT INTO `categories` (title, description, parent_id, alias, created_at,updated_at)
                                      VALUE (:title, :description, :parent_id, :alias, NOW(),NOW())";
            Database::addFakerData('fakerCategories', $sql, 10);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table categories: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        $cache = new Cache();
        $data = $cache->get('categories');
        if (!$data) {
            $sql = "SELECT 
                            id
                            ,title
                            ,description
                            ,parent_id
                            ,alias
                            ,created_at
                            ,updated_at
                    FROM `categories`;";
            $data = Database::query($sql);
            $cache->set('categories', $data);
        }
        return $data;
    }

    /**
     * @param string $byWhat
     * @param $name
     * @return array
     * @throws \Exception
     */
    public static function getDataWhere(string $byWhat, $name): array
    {
        $sql = "SELECT 
                        id
                        ,title
                        ,description
                        ,parent_id
                        ,alias
                        ,created_at
                        ,updated_at
                FROM `categories` 
                WHERE $byWhat=:name;";
        return Database::queryData($sql, [':name' => $name]);
    }

    /**
     * @return void
     */
    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}