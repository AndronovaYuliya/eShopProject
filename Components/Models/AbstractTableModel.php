<?php

namespace Components\Models;

abstract class AbstractTableModel
{
    abstract protected function addFaker():void;

    abstract protected function getData():array;

    abstract protected function getDataWhere(string $byWhat, string $name):array;

}