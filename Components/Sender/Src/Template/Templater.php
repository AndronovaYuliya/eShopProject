<?php

namespace Components\Sender\Src\Template;

class Templater
{
    public $data=[];
    static public $root='.';
    static $ext;

    public static function template()
    {
        end($_POST );
        $file = '/view/'.key($_POST).'.php';
        ob_start();
        extract($_POST, EXTR_OVERWRITE);

        require __DIR__.$file;
        return ob_get_clean();
    }
}
