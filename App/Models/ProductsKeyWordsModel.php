<?php

namespace App\Models;

use App\Mappers\ProductsKeyWordsMapper;

class ProductsKeyWordsModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        ProductsKeyWordsMapper::addFakerData();
    }

    public static function getData(): array
    {
        return ProductsKeyWordsMapper::getData();
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