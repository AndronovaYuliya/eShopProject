<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class CommentsMapper
 * @package AppModel\Mappers
 */
class CommentsMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM comments ";
    protected const INSERT = "INSERT INTO 'comments' 
            ( created_at, updated_at)
            VALUE ( NOW(), NOW())";
}
