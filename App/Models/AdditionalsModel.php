<?php

namespace App\Models;

use App\Mappers\AdditionalsMapper;

class AdditionalsModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        AdditionalsMapper::addFakerData();
    }

    public static function query(): array
    {
        return AdditionalsMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return AdditionalsMapper::getDataWhere($byWhat, $name);

    }
}