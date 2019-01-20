<?php

namespace App\Models;

use App\Mappers\OrdersMapper;

class OrdersModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        OrdersMapper::addFakerData();
    }

    public static function getData(): array
    {
        return OrdersMapper::getData();
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return OrdersMapper::getDataWhere($byWhat, $name);
    }
}