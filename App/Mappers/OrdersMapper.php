<?php

namespace App\Mappers;

use Core\AbstractMapper;

/**
 * Class OrdersMapper
 * @package AppModel\Mappers
 */
class OrdersMapper extends AbstractMapper
{
    protected const SELECT = "SELECT * FROM orders";
}