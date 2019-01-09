<?php

namespace Components\Models;

use Components\Mappers\AttributesValuesMapper;

class AttributesValuesModel
{
    public static function addAttributesValues():void
    {
        AttributesValuesMapper::addAttributesValues();
    }
}