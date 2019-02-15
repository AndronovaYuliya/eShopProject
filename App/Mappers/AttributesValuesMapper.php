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
}
