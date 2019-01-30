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
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        AdditionalsMapper::addFakerData();
    }

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