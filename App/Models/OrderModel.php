<?php

namespace App\Models;

use App\Mappers\OrderMapper;
use Core\App;
use Core\Session;

/**
 * Class OrderModel
 * @package App\Models
 */
class OrderModel extends App
{
    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public static function saveOrder($data)
    {
        $sum = Session::getData('cart', 0)['total'];
        $orderId= OrderMapper::addOrder([':sum' => $sum, ':id_client' => $data['id']]);
        self::saveOrderProduct($orderId);
        return $orderId;
    }

    /**
     * @param $orderId
     * @throws \Exception
     */
    private static function saveOrderProduct($orderId)
    {
        $orders = Session::get('cart');
        OrderMapper::saveOrderProduct($orders, $orderId);
    }

    public static function mailOrder($orderId, $userEmail)
    {

    }
}