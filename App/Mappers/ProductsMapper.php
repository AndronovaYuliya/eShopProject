<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class ProductsMapper
 * @package AppModel\Mappers
 */
class ProductsMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM products";
}
