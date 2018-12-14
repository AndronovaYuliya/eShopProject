<?php

class ParseURLModel
{
    static function parseUrl($url='/')
    {
        $arrayUrl=parse_url($url);
        return explode('/',$arrayUrl['path']);
    }
}