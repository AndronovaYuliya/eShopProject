<?php

namespace App\Models;

use App\Mappers\OrdersMapper;
use Core\AbstractModel;
use Core\Session;
use Core\TSingletone;
use Faker\Provider\DateTime;

/**
 * Class OrdersModel
 * @package AppModel\Models
 */
class OrdersModel extends AbstractModel
{
    use TSingletone;

    /**
     * @var int
     */
    protected $id;

    protected $date;

    /**
     * @var float
     */
    protected $sum;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var string
     */
    protected $ttn;

    /**
     * @var int
     */
    protected $id_client;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param $date
     * @return OrdersModel
     */
    public function setDate($date): OrdersModel
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @param $sum
     * @return OrdersModel
     */
    public function setSum($sum): OrdersModel
    {
        $this->sum = $sum;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param $status
     * @return OrdersModel
     */
    public function setStatus($status): OrdersModel
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getTtn(): string
    {
        return $this->ttn;
    }

    /**
     * @param $ttn
     * @return OrdersModel
     */
    public function setTtn($ttn): OrdersModel
    {
        $this->ttn = $ttn;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdClient(): int
    {
        return $this->id_client;
    }

    /**
     * @param $id_client
     * @return OrdersModel
     */
    public function setIdClient($id_client): OrdersModel
    {
        $this->id_client = $id_client;
        return $this;
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    /*public static function saveOrder($data)
    {
        $sum = Session::getData('cart', 0)['total'];
        $orderId = OrdersMapper::addOrder([':sum' => $sum, ':id_client' => $data['id']]);
        self::saveOrderProduct($orderId);
        return $orderId;
    }*/

    /**
     * @param $orderId
     * @throws \Exception
     */
    /*private static function saveOrderProduct($orderId)
    {
        $orders = Session::get('cart');
        OrdersMapper::saveOrderProduct($orders, $orderId);
    }*/

    /**
     * @return array|mixed|null
     * @throws \Exception
     */
    public static function getOrders()
    {
        $login = Session::get('login');
        if ($login) {
            return OrdersMapper::getInstance()->findOne('login=:login', [':login' => '22nell92']);
        }
        return null;
    }

    /**
     * @param $id
     * @throws \Exception
     */
    /* public static function orderDetail($id)
     {
         $data = OrdersMapper::getOrderDetail('id', $id);
         $table = self::printOrder($data);
         echo json_encode($table);
         die();
     }*/

    /**
     * @param $data
     * @return array
     */
    /*public static function printOrder($data)
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
    }*/
}