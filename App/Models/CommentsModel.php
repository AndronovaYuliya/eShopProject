<?php

namespace App\Models;

use App\Mappers\CommentsMapper;

/**
 * Class CommentsModel
 * @package App\Models
 */
class CommentsModel extends AbstractTableModel
{
    /**
     * @return void
     */
    public static function addFakerData(): void
    {
        CommentsMapper::addFakerData();
    }

    public static function query(): array
    {
        return CommentsMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return CommentsMapper::getDataWhere($byWhat, $name);
    }
}