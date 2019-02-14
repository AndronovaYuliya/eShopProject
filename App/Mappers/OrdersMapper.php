<?php

namespace App\Mappers;

use Core\AbstractMapper;

/**
 * Class OrdersMapper
 * @package App\Mappers
 */
class OrdersMapper extends AbstractMapper
{
    protected const SELECT = "SELECT * FROM orders";
}