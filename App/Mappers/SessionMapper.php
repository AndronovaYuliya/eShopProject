<?php

namespace App\Mappers;


use Core\AbstractMapper;

/**
 * Class SessionMapper
 * @package AppModel\Mappers
 */
class SessionMapper extends AbstractMapper
{
    protected const SELECT = "SELECT * FROM sessions";
}