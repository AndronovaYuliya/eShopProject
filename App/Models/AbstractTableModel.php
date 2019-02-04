<?php

namespace App\Models;

/**
 * Class AbstractTableModel
 * @package App\Models
 */
abstract class AbstractTableModel
{
    /**
     * @return array
     */
    abstract protected static function query(): array;

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    abstract protected static function getDataWhere(string $byWhat, string $name): array;


}