<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class ProductsImagesMapper
 * @package AppModel\Mappers
 */
class ProductsImagesMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM products_images ";
}