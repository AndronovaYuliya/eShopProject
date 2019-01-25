<?php

namespace App\Models;

use App\Mappers\OrdersMapper;

/**
 * Class OrdersModel
 * @package App\Models
 */
class OrdersModel
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        OrdersMapper::addFakerData();
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        return OrdersMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return OrdersMapper::getDataWhere($byWhat, $name);
    }
}