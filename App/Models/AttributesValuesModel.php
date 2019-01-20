<?php

namespace App\Models;

use App\Mappers\AttributesValuesMapper;

class AttributesValuesModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        AttributesValuesMapper::addFakerData();
    }

    public static function getData(): array
    {
        return AttributesValuesMapper::getData();
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return AttributesValuesMapper::getDataWhere($byWhat, $name);
    }
}