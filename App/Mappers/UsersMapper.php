<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class UsersMapper
 * @package AppModel\Mappers
 */
class UsersMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM users ";
}
