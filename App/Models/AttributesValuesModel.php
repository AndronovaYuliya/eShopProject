<?php

namespace App\Models;

use App\Mappers\AttributesValuesMapper;

/**
 * Class AttributesValuesModel
 * @package App\Models
 */
class AttributesValuesModel
{
    /**
     * @return array
     */
    public static function query(): array
    {
        return AttributesValuesMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return AttributesValuesMapper::getDataWhere($byWhat, $name);
    }
}