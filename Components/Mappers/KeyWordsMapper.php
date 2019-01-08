<?php

namespace Components\Mappers;

use Components\Core\Database;

class KeyWordsMapper
{
    public static function addKeyWords():void
    {
        $sql = "INSERT INTO `key_words` (name, created_at, updated_at) VALUE (:name, NOW(), NOW())";
        Database::addData('fakerKeyWords', $sql, 10);
    }
}