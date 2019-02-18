<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class AttributesValuesMapper
 * @package AppModel\Mappers
 */
class AttributesValuesMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM attributes_values ";
    protected const INSERT = "INSERT INTO 'attributes_values' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}
