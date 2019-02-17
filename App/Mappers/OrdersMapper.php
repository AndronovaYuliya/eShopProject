<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class OrdersMapper
 * @package AppModel\Mappers
 */
class OrdersMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM orders ";
    protected const INSERT = "INSERT INTO 'orders' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}
