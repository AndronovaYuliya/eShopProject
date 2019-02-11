<?php

namespace App\Models;

use App\Mappers\AttributesMapper;

/**
 * Class AttributesModel
 * @package App\Models
 */
class AttributesModel extends AbstractTableModel
{
    /**
     * @return array
     */
    public static function query(): array
    {
        return AttributesMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return AttributesMapper::getDataWhere($byWhat, $name);
    }
}