<?php

namespace App\Models;

use App\Mappers\UsersMapper;

/**
 * Class UsersModel
 * @package App\Models
 */
class UsersModel
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        UsersMapper::addFakerData();
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        return UsersMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return UsersMapper::getDataWhere($byWhat, $name);
    }
}