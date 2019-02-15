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
}
