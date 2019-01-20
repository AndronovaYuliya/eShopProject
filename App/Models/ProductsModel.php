<?php

namespace App\Models;

use App\Mappers\ProductsMapper;

class ProductsModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        ProductsMapper::addFakerData();
    }

    public static function getFullData(): array
    {
        $data = ProductsMapper::getFullData();
        $data = self::myExploded('file_name', $data);
        $data = self::myExploded('key_words', $data);
        $data = self::myExploded('id_key_word', $data);
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ProductsMapper::getDataWhere($byWhat, $name);
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getProductWithImg(string $byWhat, string $name): array
    {
        $data = ProductsMapper::getProductWithImg($byWhat, $name);
        $data = self::myExploded('file_name', $data);
        $data = self::myExploded('key_words', $data);
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public function getDataByCategory(string $byWhat, string $name): array
    {
        $data = ProductsMapper::getDataByCategory($byWhat, $name);
        $data = self::myExploded('file_name', $data);
        return $data;
    }

    /**
     * @param array $search
     */
    public static function getDataLike(array $search): array
    {
        $data = ProductsMapper::getDataLike($search);
        $data = self::myExploded('file_name', $data);
        return $data;
    }

    /**
     * @param string $name
     * @param $data
     */
    private static function myExploded(string $name, $data): array
    {
        $count = count($data);

        for ($i = 0; $i < $count; $i++) {
            $data[$i][$name] = explode(',', $data[$i][$name]);
        }
        return $data;
    }

    public static function getData(): array
    {
        return ProductsMapper::getData();
    }

    /**
     * @param $data
     */
    public static function getKeyData($data): array
    {
        $data = ProductsMapper::getKeyData('name', $data);
        $data = self::myExploded('file_name', $data);
        return $data;
    }
}
