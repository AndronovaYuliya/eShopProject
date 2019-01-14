<?php

namespace Components\Models;

use Components\Mappers\CategoriesAttributesMapper;

class CategoriesAttributesModel extends AbstractTableModel
{
    public static function addFaker():void
    {
        CategoriesAttributesMapper::addData();
    }

    public static function getData():array
    {
        return CategoriesAttributesMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name):array
    {
        return CategoriesAttributesMapper::getDataWhere($byWhat, $name);
    }
}