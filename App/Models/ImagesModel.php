<?php

namespace App\Models;

use App\Mappers\ImagesMapper;

/**
 * Class ImagesModel
 * @package App\Models
 */
class ImagesModel extends AbstractTableModel
{
    /**
     * @return array
     */
    public static function query(): array
    {
        return ImagesMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ImagesMapper::getDataWhere($byWhat, $name);
    }
}