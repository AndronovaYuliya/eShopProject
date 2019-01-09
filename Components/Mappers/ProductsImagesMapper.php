<?php

namespace Components\Mappers;

use Components\Core\Database;

class ProductsImagesMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'products_images'";

    public static function addProductsImages():void
    {
        $sql = "INSERT INTO `products_images` (id_galary, id_product, created_at, updated_at) VALUE (:id_galary, :id_product,NOW(), NOW())";
        Database::addData('fakerProductsImages', $sql, 10);
    }

}