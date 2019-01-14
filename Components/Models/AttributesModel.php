<?php

namespace Components\Models;

use Components\Mappers\AttributesMapper;

class AttributesModel extends AbstractTableModel
{
    public static function addFaker():void
    {
        AttributesMapper::addData();
    }

    public static function getData():array
    {
        return AttributesMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name):array
    {
        return AttributesMapper::getDataWhere($byWhat, $name);
    }
}