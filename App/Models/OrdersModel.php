<?php

namespace App\Models;

use App\Mappers\OrdersMapper;
use Core\Session;

/**
 * Class OrdersModel
 * @package App\Models
 */
class OrdersModel
{
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

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public static function saveOrder($data)
    {
        $sum = Session::getData('cart', 0)['total'];
        $orderId = OrdersMapper::addOrder([':sum' => $sum, ':id_client' => $data['id']]);
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
        OrdersMapper::saveOrderProduct($orders, $orderId);
    }

    /**
     * @return array|mixed|null
     * @throws \Exception
     */
    public static function getOrders()
    {
        $login = Session::get('login');
        if ($login) {
            return OrdersMapper::getDataByClient('login', '22nell92');
        }
        return null;
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public static function orderDetail($id)
    {
        $data = OrdersMapper::getOrderDetail('id', $id);
        $table = self::printOrder($data);
        echo json_encode($table);
        die();
    }

    /**
     * @param $data
     * @return array
     */
    public static function printOrder($data)
    {
        $table = [];
        foreach ($data as $key => $value) {
            $table[] = <<<HTML
            <tr>
                <td>{$value['title']}</td>
                <td>{$value['brand']}</td>
                <td>{$value['count']}</td>
                <td>{$value['price']}</td>
            </tr>
HTML;
        }
        return $table;
    }
}