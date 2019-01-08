<?php

namespace Components\Models;

use Components\Core\MyException;

class DataBaseModel
{
    private static $data=[];
    private static $array=[];

    /*
     * return array
     * /read for test exception
     * */
    public static function getData($fileName='/read'):array
    {
        if($fileName=='/read'){
            throw new MyException("File is empty",02);
        }

        $data = file_get_contents('../'.$fileName);

        return unserialize($data);
    }

    /*
     * write data to file
     * */
    public static function setDB($array, $fileName):void
    {
        self::$data = serialize($array);
        file_put_contents($fileName, self::$data);
    }
}