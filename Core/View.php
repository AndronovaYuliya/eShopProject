<?php

namespace Core;

class View
{
    public static function generate($content_view, $data)
    {
        include '../resources/home/' . $content_view;
    }
}