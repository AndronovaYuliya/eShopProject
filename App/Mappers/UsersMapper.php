<?php

namespace App\Mappers;

use Core\AbstractMapper;

/**
 * Class UsersMapper
 * @package App\Mappers
 */
class UsersMapper extends AbstractMapper
{
    protected const SELECT = "SELECT * FROM users";
}