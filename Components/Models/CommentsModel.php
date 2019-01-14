<?php

namespace Components\Models;

use Components\Mappers\CommentsMapper;

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