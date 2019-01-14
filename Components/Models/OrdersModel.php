<?php

namespace Components\Models;

use Components\Mappers\OrdersMapper;

class OrdersModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        OrdersMapper::addData();
    }

    public static function getData(): array
    {
        return OrdersMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return OrdersMapper::getDataWhere($byWhat, $name);
    }
}