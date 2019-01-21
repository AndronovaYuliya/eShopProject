<?php

namespace App\Models;

use App\Mappers\CategoriesMapper;

class CategoriesModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        CategoriesMapper::addFakerData();
    }

    public static function query(): array
    {
        return CategoriesMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return CategoriesMapper::getDataWhere($byWhat, $name);
    }
}