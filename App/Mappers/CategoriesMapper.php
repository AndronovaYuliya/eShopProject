<?php

namespace App\Mappers;

use Core\AbstractMapper;

/**
 * Class CategoriesMapper
 * @package App\Mappers
 */
class CategoriesMapper extends AbstractMapper
{
    protected const SELECT = "SELECT * FROM categories";
}
