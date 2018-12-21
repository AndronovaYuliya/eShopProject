<?php

namespace app\template;

class Templater
{
    public $data=[];
    static public $root='.';

    static function template($dir, $ext)
    {
        if(is_dir($dir)){
            self::$root=$dir;
        }
        else{
            die("Ошибка! ".$dir." не директория!");
        }
        self::$ext=$ext;
    }

    static function out($file,$data)
    {
        ob_start();
        extract($data, EXTR_OVERWRITE);
        require __DIR__.$file;
        return ob_get_clean();

        //return file_get_contents(__DIR__.$file);
    }
}
