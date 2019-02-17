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
    protected const INSERT = "INSERT INTO 'categories' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}
