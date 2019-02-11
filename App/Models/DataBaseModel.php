<?php

namespace App\Models;

use Core\MyException;

/**
 * Class DataBaseModel
 * @package App\Models
 */
class DataBaseModel
{
    private static $data = [];

    /**
     * @param string $fileName
     * @return array
     * @throws MyException
     */
    public static function query(string $fileName = '/read'): array
    {
        if ($fileName == '/read') {
            throw new MyException("File is empty", 200);
        }

        $data = file_get_contents('../' . $fileName);

        return unserialize($data);
    }

    /**
     * @param $array
     * @param string $fileName
     * @return void
     */
    public static function setDB($array, string $fileName): void
    {
        self::$data = serialize($array);
        file_put_contents($fileName, self::$data);
    }
}