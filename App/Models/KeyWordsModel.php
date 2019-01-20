<?php

namespace App\Models;

use App\Mappers\KeyWordsMapper;

class KeyWordsModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        KeyWordsMapper::addFakerData();
    }

    public static function getData(): array
    {
        return KeyWordsMapper::getData();
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return KeyWordsMapper::getDataWhere($byWhat, $name);
    }
}