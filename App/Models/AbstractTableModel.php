<?php

namespace App\Models;

abstract class AbstractTableModel
{
    abstract static protected function addFakerData(): void;

    abstract static protected function getData(): array;

    /**
     * @param string $byWhat
     * @param string $name
     */
    abstract static protected function getDataWhere(string $byWhat, string $name): array;
}