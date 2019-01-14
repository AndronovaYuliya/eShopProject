<?php

namespace Components\Models;

abstract class AbstractTableModel
{
    abstract protected function addFaker():void;

    abstract static protected function getData():array;

    abstract static protected function getDataWhere(string $byWhat, string $name):array;

    abstract protected function toObject($data):array;

}