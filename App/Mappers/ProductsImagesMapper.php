<?php

namespace App\Mappers;

use Core\Database;

/**
 * Class ProductsImagesMapper
 * @package App\Mappers
 */
class ProductsImagesMapper extends AbstractTableMapper
{
    /**
     * @return void
     */
    public static function addFakerData(): void
    {
        $sql = "INSERT INTO `products_images` (id_galary, id_product, created_at, updated_at) VALUE (:id_galary, :id_product,NOW(), NOW())";
        Database::addFakerData('fakerProductsImages', $sql, 20);
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        $sql = "SELECT id, id_galary,id_product, created_at, updated_at FROM `products_images`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, id_galary,id_product, created_at, updated_at FROM `products_images` WHERE $byWhat=$name;";
        return Database::query($sql);
    }

    /**
     * @return void
     */
    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}