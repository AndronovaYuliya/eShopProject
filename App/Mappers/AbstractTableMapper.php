<?php

namespace App\Mappers;

/**
 * Class AbstractTableMapper
 * @package App\Mappers
 */
abstract class AbstractTableMapper
{
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