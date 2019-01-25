<?php

namespace App\Mappers;

use Core\Database;

/**
 * Class AttributesMapper
 * @package App\Mappers
 */
class AttributesMapper extends AbstractTableMapper
{
    /**
     * @return void
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `attributes` (title, created_at, updated_at) 
                                        VALUE (:title, NOW(), NOW())";
            Database::addFakerData('fakerAttributes', $sql, 10);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table attributes: " => $e->getTraceAsString()], 500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        $sql = "SELECT 
                        id
                        ,title
                        ,created_at
                        ,updated_at 
                FROM `attributes`;";
        return Database::query($sql);
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
                        ,title
                        ,created_at
                        ,updated_at 
                FROM `attributes` 
                WHERE $byWhat=$name;";
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