<?php

namespace App\Mappers;

use Core\Cache;
use Core\Database;

class CategoriesMapper extends AbstractTableMapper
{
    public static function addFakerData(): void
    {
        $sql = "INSERT INTO `categories` (title, description, parent_id, url, created_at,updated_at) VALUE (:title, :description, :parent_id, :url, NOW(),NOW())";
        Database::addFakerData('fakerCategories', $sql, 10);
    }

    public static function getData(): array
    {
        $cache = new Cache();
        $data = $cache->get('categories');
        if (!$data) {
            $sql = "SELECT id, title, description, parent_id,url, created_at, updated_at FROM `categories`;";
            $data = Database::getData($sql);
            $cache->set('categories', $data);
        }
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, title,url, created_at, updated_at FROM `categories` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }


    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}