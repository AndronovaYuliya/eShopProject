<?php

namespace Components\Models;

use Components\Mappers\ProductsImagesMapper;

class ProductsImagesModel
{
    public static function addProductsImages():void
    {
        ProductsImagesMapper::addProductsImages();
    }
}