<?php

namespace App\Models;

use Core\MyException;

class DataBaseModel
{
    private static $data = [];

    /*
     *  @param string $fileName = '/read'
     *  return array
     * /read for test exception
     * */
    public static function getData(string $fileName = '/read'): array
    {
        if ($fileName == '/read') {
            throw new MyException("File is empty", 02);
        }

        $data = file_get_contents('../' . $fileName);

        return unserialize($data);
    }

    /*
     *  @param string $fileName
     *  @param $array
     * write data to file
     * */
    public static function setDB($array, string $fileName): void
    {
        self::$data = serialize($array);
        file_put_contents($fileName, self::$data);
    }
}