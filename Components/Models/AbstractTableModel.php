<?php

namespace Components\Models;

abstract class AbstractTableModel
{
    abstract static protected function addFaker():void;

    abstract static protected function getData():array;

    abstract static protected function getDataWhere(string $byWhat, string $name):array;
}