<?php

namespace App\Mappers;

abstract class AbstractTableMapper
{
    private static $_checkTable;

    public function __construct()
    {

    }

    abstract protected static function addData(): void;

    abstract protected static function addFakerData(): void;

    abstract protected static function getData(): array;

    /**
     * @param string $byWhat
     * @param string $name
     */
    abstract protected static function getDataWhere(string $byWhat, string $name);


}