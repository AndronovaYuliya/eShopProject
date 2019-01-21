<?php

namespace App\Models;

use App\Mappers\ProductsKeyWordsMapper;

class ProductsKeyWordsModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        ProductsKeyWordsMapper::addFakerData();
    }

    public static function query(): array
    {
        return ProductsKeyWordsMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ProductsKeyWordsMapper::getDataWhere($byWhat, $name);
    }
}