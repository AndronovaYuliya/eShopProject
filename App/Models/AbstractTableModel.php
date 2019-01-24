<?php

namespace App\Models;

/**
 * Class AbstractTableModel
 * @package App\Models
 */
abstract class AbstractTableModel
{
    /**
     *
     */
    abstract public static function addFakerData(): void;

    /**
     * @return array
     */
    abstract public static function query(): array;

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    abstract public static function getDataWhere(string $byWhat, string $name): array;
}