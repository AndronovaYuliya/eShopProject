<?php

namespace App\Mappers;

use Core\AbstractMapper;

/**
 * Class CategoriesMapper
 * @package AppModel\Mappers
 */
class CategoriesMapper extends AbstractMapper
{
    protected const SELECT = "SELECT * FROM categories";
}
