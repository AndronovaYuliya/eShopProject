<?php

namespace App\Mappers;

use Core\AbstractMapper;

/**
 * Class ProductsMapper
 * @package AppModel\Mappers
 */
class ProductsMapper extends AbstractMapper
{
    protected const SELECT = "SELECT * FROM products";
}
