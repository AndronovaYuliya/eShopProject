<?php

namespace Components\Models;

use Components\Mappers\ProductsMapper;

class ProductsModel
{
    public static function addProducts():void
    {
        ProductsMapper::addProducts();
    }

    public static function getProducts():array
    {
        return ProductsMapper::getProducts();

    }
}