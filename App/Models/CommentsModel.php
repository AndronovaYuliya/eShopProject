<?php

namespace App\Models;

use App\Mappers\CommentsMapper;

class CommentsModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        CommentsMapper::addData();
    }

    public static function getData(): array
    {
        return CommentsMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return CommentsMapper::getDataWhere($byWhat, $name);
    }
}