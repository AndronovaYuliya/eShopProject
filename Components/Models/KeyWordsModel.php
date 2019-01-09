<?php

namespace Components\Models;

use Components\Mappers\KeyWordsMapper;

class KeyWordsModel
{
    public static function addKeyWords():void
    {
        KeyWordsMapper::addKeyWords();
    }
}