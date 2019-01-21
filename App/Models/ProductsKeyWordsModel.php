<?php

namespace App\Models;

use App\Mappers\ProductsKeyWordsMapper;

/**
 * Class ProductsKeyWordsModel
 * @package App\Models
 */
class ProductsKeyWordsModel extends AbstractTableModel
{
    /**
     * @return void
     */
    public static function addFakerData(): void
    {
        ProductsKeyWordsMapper::addFakerData();
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        return ProductsKeyWordsMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ProductsKeyWordsMapper::getDataWhere($byWhat, $name);
    }
}