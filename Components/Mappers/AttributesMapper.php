<?php

namespace Components\Mappers;

use Components\Core\Database;

class AttributesMapper
{
    public static function addAttributes():void
    {
        $sql = "INSERT INTO `attributes` (title, created_at, updated_at) VALUE (:title, NOW(), NOW())";
        Database::addData('fakerAttributes', $sql, 10);
    }

}