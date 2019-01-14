<?php

namespace Components\Models;

use Components\Mappers\ProductsMapper;

class ProductsModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        ProductsMapper::addData();
    }

    public static function getData():array
    {
        $data = ProductsMapper::getData();
        $data=self::myExploded('file_name',$data);
        $data=self::myExploded('key_words',$data);
        return $data;
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ProductsMapper::getDataWhere($byWhat, $name);
    }

    public static function getProductWithImg(string $byWhat, string $name): array
    {
        $data = ProductsMapper::getProductWithImg($byWhat,$name);
        $data=self::myExploded('file_name',$data);
        $data=self::myExploded('key_words',$data);
        return $data;
    }

    public function getDataByCategory(string $byWhat, string $name): array
    {
        $data = ProductsMapper::getDataByCategory($byWhat,$name);
        $data=self::myExploded('file_name',$data);
        return $data;
    }

    public static function getDataLike(array $search):array
    {
        $data=ProductsMapper::getDataLike($search);
        $data=self::myExploded('file_name',$data);
        return $data;
    }

    private static function myExploded(string $name, $data)
    {
        $count=count($data);

        for($i=0; $i<$count; $i++){
            $data[$i][$name]=explode(',',$data[$i][$name]);
        }
        return $data;
    }
}
