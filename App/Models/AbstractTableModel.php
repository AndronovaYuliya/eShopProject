<?php

namespace App\Models;

abstract class AbstractTableModel
{
    abstract static protected function addFakerData(): void;

    abstract static protected function query(): array;

    /**
     * @param string $byWhat
     * @param string $name
     */
    abstract static protected function getDataWhere(string $byWhat, string $name): array;
}