<?php

class ProductModel{
    private static $fileName='array.txt';

    public static function getProduct($params)
    {
        $products=self::getProducts();
        $result=[];
        $flag=false;
        foreach( $products as $key => $value )
        {
            $flag=false;
            foreach ($params as $keyParam => $valueParam )
            {
                if($value[$keyParam]==$valueParam)
                {
                    $flag=true;
                }

                else
                {
                    $flag=false;
                    break;
                }
            }
            if($flag)
            {
                $result[]=$value;
            }
        }
        return $result;
    }

    public static function getProducts():array
    {
        return DataBaseModel::getData(self::$fileName);
    }
}
