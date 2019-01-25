<?php

namespace App\Models;

use App\Mappers\ProductsImagesMapper;

/**
 * Class ProductsImagesModel
 * @package App\Models
 */
class ProductsImagesModel
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        ProductsImagesMapper::addFakerData();
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        return ProductsImagesMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ProductsImagesMapper::getDataWhere($byWhat, $name);
    }
}