<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class AdditionalsMapper
 * @package AppModel\Mappers
 */
class AdditionalsMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM additionals ";
    protected const INSERT = "INSERT INTO 'additionals' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}
