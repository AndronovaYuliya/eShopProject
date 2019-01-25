<?php

namespace App\Mappers;

/**
 * Class AbstractTableMapper
 * @package App\Mappers
 */
abstract class AbstractTableMapper
{
    /**
     * @return void
     */
    abstract protected static function addData(): void;

    /**
     * @return void
     */
    abstract protected static function addFakerData(): void;

    /**
     * @return array
     */
    abstract protected static function query(): array;

    /**
     * @param string $byWhat
     * @param string $name
     * @return mixed
     */
    abstract protected static function getDataWhere(string $byWhat, string $name);
}