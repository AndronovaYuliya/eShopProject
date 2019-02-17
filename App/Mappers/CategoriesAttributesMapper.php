<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class CategoriesAttributesMapper
 * @package AppModel\Mappers
 */
class CategoriesAttributesMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM categories_attributes ";
    protected const INSERT = "INSERT INTO 'categories_attributes' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}
