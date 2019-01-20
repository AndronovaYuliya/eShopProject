<?php

namespace App\Models;

use App\Mappers\ProductsImagesMapper;

class ProductsImagesModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        ProductsImagesMapper::addFakerData();
    }

    public static function getData(): array
    {
        return ProductsImagesMapper::getData();
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ProductsImagesMapper::getDataWhere($byWhat, $name);
    }
}