<?php

namespace App\Mappers;

use Core\TSingletone;
use Core\AbstractMapper;

/**
 * Class SessionMapper
 * @package AppModel\Mappers
 */
class SessionMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM sessions ";
    protected const INSERT = "INSERT INTO 'sessions' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}