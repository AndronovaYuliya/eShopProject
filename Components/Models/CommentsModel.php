<?php

namespace Components\Models;

use Components\Mappers\CommentsMapper;

class CommentsModel
{
    public static function addComments():void
    {
        CommentsMapper::addComments();
    }
}