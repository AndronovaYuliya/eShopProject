<?php
namespace Components\Models;

use Components\Mappers\KeyWordsMapper;

class KeyWordsModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        KeyWordsMapper::addData();
    }

    public static function getData(): array
    {
        return KeyWordsMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return KeyWordsMapper::getDataWhere($byWhat, $name);
    }
}