<?php

namespace App\Mappers;

use Core\Database;

class CommentsMapper extends AbstractTableMapper
{
    //faker
    public static function addData(): void
    {
        $sql = "INSERT INTO `comments` (msg, user, id_product, stars, created_at,updated_at) VALUE (:msg, :user, :id_product, :stars, NOW(), NOW())";
        Database::addData('fakerComments', $sql, 10);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, msg,user,id_product,stars, created_at, updated_at FROM `comments`;";
        return Database::getData($sql);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, msg,user,id_product,stars, created_at, updated_at FROM `comments` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }
}