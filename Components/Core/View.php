<?php

namespace Components\Core;

class View
{
    public static function generate($content_view, $data = null)
    {
        include '../resources/home/'.$content_view;
    }
}