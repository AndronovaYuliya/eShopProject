<?php

namespace App\Models;

use App\Mappers\AdditionalsMapper;

/**
 * Class AdditionalsModel
 * @package App\Models
 */
class AdditionalsModel
{
    /**
     * @return array
     */
    public static function query(): array
    {
        return AdditionalsMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return AdditionalsMapper::getDataWhere($byWhat, $name);
    }
}