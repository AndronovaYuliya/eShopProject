<?php

namespace App\Models;

use App\Mappers\CategoriesMapper;

/**
 * Class CategoriesModel
 * @package App\Models
 */
class CategoriesModel
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        CategoriesMapper::addFakerData();
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        return CategoriesMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return CategoriesMapper::getDataWhere($byWhat, $name);
    }
}