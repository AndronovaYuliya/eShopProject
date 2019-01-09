<?php

namespace Components\Models;

use Components\Mappers\AdditionalsMapper;

class AdditionalsModel
{
    public static function addAdditionals():void
    {
        AdditionalsMapper::addAdditionals();
    }
}