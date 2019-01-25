<?php

namespace App\Models;

use App\Mappers\KeyWordsMapper;

/**
 * Class KeyWordsModel
 * @package App\Models
 */
class KeyWordsModel
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        KeyWordsMapper::addFakerData();
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        return KeyWordsMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return KeyWordsMapper::getDataWhere($byWhat, $name);
    }
}