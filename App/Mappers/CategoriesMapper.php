<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class CategoriesMapper
 * @package AppModel\Mappers
 */
class CategoriesMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM categories ";
}
