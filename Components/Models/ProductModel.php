<?php

namespace Components\Models;

use Components\Core\MyException;
use Components\Models\DataBaseModel;

class ProductModel
{
    private static $fileName='array.txt';

    /*
     * return array
     */
    public static function getProduct($params):array
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

    public static function getFileName():string {
        return self::$fileName;
    }
    /*
     * return array
     * */
    public static function getProducts():array
    {
        try{
            return DataBaseModel::getData(self::$fileName);
        }catch (MyException $myException){
            return $myException->exception_error_file();
        }

    }
}
