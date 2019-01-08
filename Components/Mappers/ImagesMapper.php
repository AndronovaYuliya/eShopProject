<?php

namespace Components\Mappers;

use Components\Core\Database;

class ImagesMapper
{
    public static function addImages():void
    {
        $sql = "INSERT INTO `images` (file_name, created_at, updated_at) VALUE (:file_name, NOW(), NOW())";
        Database::addData('fakerImages', $sql, 10);
    }
}