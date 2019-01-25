<?php

namespace App\Mappers;

use Core\Database;

/**
 * Class CommentsMapper
 * @package App\Mappers
 */
class CommentsMapper
{
    /**
     * @return void
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `comments` (msg, user, id_product, stars, created_at,updated_at)
              VALUE (:msg, :user, :id_product, :stars, NOW(), NOW())";
            Database::addFakerData('fakerComments', $sql, 10);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table comments: {$e->getTraceAsString()}"],500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        $sql = "SELECT id, msg,user,id_product,stars, created_at, updated_at FROM `comments`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, msg,user,id_product,stars, created_at, updated_at FROM `comments` WHERE $byWhat=$name;";
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