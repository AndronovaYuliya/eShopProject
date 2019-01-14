<?php

namespace Components\Models;

use Components\Mappers\ProductsKeyWordsMapper;

class ProductsKeyWordsModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        ProductsKeyWordsMapper::addData();
    }

    public static function getData(): array
    {
        return ProductsKeyWordsMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ProductsKeyWordsMapper::getDataWhere($byWhat, $name);
    }
}