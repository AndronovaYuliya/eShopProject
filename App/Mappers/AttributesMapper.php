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
}
