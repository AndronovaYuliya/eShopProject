<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class KeyWordsMapper
 * @package AppModel\Mappers
 */
class KeyWordsMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM key_words ";
    protected const INSERT = "INSERT INTO 'key_words' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}
