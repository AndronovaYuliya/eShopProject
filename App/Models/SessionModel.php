<?php

namespace App\Models;

use App\Mappers\ProductsKeyWordsMapper;
use Core\SessionMapper;

/**
 * Class SessionModel
 * @package App\Models
 */
class SessionModel
{
    /**
     * @return array
     */
    public static function query(): array
    {
        return SessionMapper::query();
    }
}