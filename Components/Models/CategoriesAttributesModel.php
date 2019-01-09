<?php

namespace Components\Models;

use Components\Mappers\CategoriesAttributesMapper;

class CategoriesAttributesModel
{
    public static function addCategoriesAttributes():void
    {
        CategoriesAttributesMapper::addCategoriesAttributes();
    }
}