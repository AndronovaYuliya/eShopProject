<?php

namespace Components\Models;

use Components\Mappers\CategoriesMapper;

class CategoriesModel
{
    public static function addCategories():void
    {
        CategoriesMapper::addCategories();
    }

    public static function getCategories():array
    {
        return CategoriesMapper::getCategories();
    }

    public static function getCategoryWhere(string $byWhat, string $name)
    {
        return CategoriesMapper::getCategoryWhere($byWhat, $name);
    }
}