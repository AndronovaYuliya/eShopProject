<?php

namespace App\Models;

use App\Mappers\CategoriesMapper;

class CategoriesModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        CategoriesMapper::addFakerData();
    }

    public static function getData(): array
    {
        return CategoriesMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return CategoriesMapper::getDataWhere($byWhat, $name);
    }
}