<?php

namespace Core;

class View
{
    /**
     * @param string $content_view
     * @param array $data
     */
    public static function generate(string $content_view, array $data)
    {
        include '../resources/home/' . $content_view;
    }
}