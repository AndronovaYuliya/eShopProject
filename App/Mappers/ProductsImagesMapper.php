<?php

namespace App\Mappers;

use Core\AbstractMapper;

/**
 * Class ProductsImagesMapper
 * @package AppModel\Mappers
 */
class ProductsImagesMapper extends AbstractMapper
{
    protected const SELECT = "SELECT * FROM products_images";
}