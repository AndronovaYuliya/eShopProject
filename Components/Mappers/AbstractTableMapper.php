<?php

namespace Components\Mappers;

abstract class AbstractTableMapper
{
    private static $_checkTable;

    public function __construct()
    {

    }

    abstract protected static function addData():void;
    abstract protected static function getData():array;
    abstract protected static function getDataWhere(string $byWhat,string $name);


}