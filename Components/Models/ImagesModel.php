<?php

namespace Components\Models;

use Components\Mappers\ImagesMapper;

class ImagesModel
{
    public static function addImages():void
    {
        ImagesMapper::addImages();
    }

    public static function getImages():array
    {
        return ImagesMapper::getImages();
    }
}