<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class ProductsKeyWordsMapper
 * @package AppModel\Mappers
 */
class ProductsKeyWordsMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM products_key_words ";
}
