<?php

namespace Components\Models;

use Components\Mappers\OrdersMapper;

class OrdersModel
{
    public static function addOrders():void
    {
        OrdersMapper::addOrders();
    }

    public static function getOrders():array
    {
        return OrdersMapper::getOrders();
    }
}