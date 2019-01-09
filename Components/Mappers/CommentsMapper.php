<?php

namespace Components\Mappers;

use Components\Core\Database;

class CommentsMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'comments'";

    public static function addComments():void
    {
        $sql = "INSERT INTO `comments` (msg, user, id_product, stars, created_at,updated_at) VALUE (:msg, :user, :id_product, :stars, NOW(), NOW())";
        Database::addData('fakerComments', $sql, 10);
    }

}