<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class ClientsMapper
 * @package AppModel\Mappers
 */
class ClientsMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM clients ";
}
