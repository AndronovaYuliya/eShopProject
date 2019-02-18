<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class ImagesMapper
 * @package AppModel\Mappers
 */
class ImagesMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM images ";
    protected const INSERT = "INSERT INTO 'images' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}