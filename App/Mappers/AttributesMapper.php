<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class AttributesMapper
 * @package AppModel\Mappers
 */
class AttributesMapper extends AbstractMapper
{

    use TSingletone;

    protected const SELECT = "SELECT * FROM attributes ";
    protected const INSERT = "INSERT INTO 'attributes' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}
