<?php

namespace App\Models;

use App\Mappers\CommentsMapper;

class CommentsModel extends AbstractTableModel
{
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
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return CommentsMapper::getDataWhere($byWhat, $name);
    }
}