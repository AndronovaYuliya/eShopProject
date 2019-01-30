<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

/**
 * Class ImagesMapper
 * @package App\Mappers
 */
class ImagesMapper extends AbstractTableMapper
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `images` (file_name, created_at, updated_at) 
                                  VALUE (:file_name, NOW(), NOW())";
            Database::addFakerData('fakerImages', $sql, 20);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table images: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('images');
         if (!$data) {*/
        $sql = "SELECT 
                        id
                        ,file_name
                        ,created_at
                        ,updated_at 
                FROM `images`;";
        $data = Database::query($sql);
        /*   $cache->set('images', $data);
       }*/
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
                        ,file_name
                        ,created_at
                        ,updated_at 
                FROM `images` 
                WHERE $byWhat=$name;";
        return Database::query($sql);
    }
}