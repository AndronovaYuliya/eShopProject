<?php

namespace App\Models;

use App\Mappers\CategoriesAttributesMapper;

/**
 * Class CategoriesAttributesModel
 * @package App\Models
 */
class CategoriesAttributesModel
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        CategoriesAttributesMapper::addFakerData();
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        return CategoriesAttributesMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return CategoriesAttributesMapper::getDataWhere($byWhat, $name);
    }
}