<?php

namespace App\Models;

use App\Mappers\AttributesMapper;

class AttributesModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        AttributesMapper::addFakerData();
    }

    public static function query(): array
    {
        return AttributesMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return AttributesMapper::getDataWhere($byWhat, $name);
    }
}