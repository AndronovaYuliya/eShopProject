<?php

namespace App\Models;

use App\Mappers\ImagesMapper;

class ImagesModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        ImagesMapper::addData();
    }

    public static function getData(): array
    {
        return ImagesMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ImagesMapper::getDataWhere($byWhat, $name);
    }
}