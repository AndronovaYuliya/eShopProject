<?php

namespace App\Models;

use App\Mappers\AttributesValuesMapper;

class AttributesValuesModel extends AbstractTableModel
{
    public static function addFaker():void
    {
        AttributesValuesMapper::addData();
    }

    public static function getData(): array
    {
        return AttributesValuesMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return AttributesValuesMapper::getDataWhere($byWhat, $name);
    }
}