<?php

namespace App\Models;

use App\Mappers\ProductsImagesMapper;

class ProductsImagesModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        ProductsImagesMapper::addData();
    }

    public static function getData(): array
    {
        return ProductsImagesMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ProductsImagesMapper::getDataWhere($byWhat, $name);
    }
}