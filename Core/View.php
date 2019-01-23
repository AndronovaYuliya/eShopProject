<?php

namespace Core;

/**
 * Class View
 * @package Core
 */
abstract class View
{
    private const  PATH = '../resources/home/';

    /**
     * @param string $content_view
     * @param array $data
     */
    public static function generate(string $content_view, array $data = [])
    {
        ob_start();
        if (is_file(self::PATH . $content_view)) {
            require self::PATH . $content_view;
        }
        extract($_SESSION);
        ob_end_flush();
    }
}