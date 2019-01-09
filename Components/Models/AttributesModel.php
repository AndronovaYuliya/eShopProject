<?php

namespace Components\Models;

use Components\Mappers\AttributesMapper;

class AttributesModel
{
    private $_attributes=[];
    private $_attribute;
    private $_id;
    private $_title;
    private $_created_at;
    private $_updated_at;

    public function __construct()
    {

    }

    public static function addAttributes():void
    {
        AttributesMapper::addAttributes();
    }

    public static function getAttributes():array
    {
        return AttributesMapper::getAttributes();
    }

    public static function getAttributeWhere(string $byWhat, string $name)
    {
        return AttributesMapper::getAttributeWhere($byWhat, $name);
    }
}