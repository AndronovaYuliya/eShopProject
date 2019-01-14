<?php

namespace Components\Models;

use Components\Mappers\CategoriesMapper;

class CategoriesModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        CategoriesMapper::addData();
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