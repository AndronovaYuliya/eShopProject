<?php

namespace App\Controllers;

use App\Models\AppModel;
use Core\Session;
use Core\TSingletone;
use Sender\Sender;

/**
 * Class SenderController
 * @package AppModel\Controllers
 */
class SenderController
{
    use TSingletone;

    protected $data;

    /**
     * @throws \Exception
     */
    public function letterAction(): void
    {
        ob_start();

        $emailSubscriber = $_POST['email'];
        $name = $_POST['name'];
        $email = 'andronovayuliyatest@gmail.com';

        require RESOURCES . '/Sender/subscribe.php';

        $template = ob_get_clean();

        $config = AppModel::$app->getProperies();
        $data = ['emailTo' => $email, 'nameTo' => $name
            , 'emailFrom' => $config['email'], 'nameFrom' => $config['title']];

        Sender::sendMsg($config, $template, 'New subscriber', $data);

        echo "Sent!";
    }

    /**
     * @param $orderId
     * @param $email
     * @param $name
     * @throws \Exception
     */
    public function mailOrder($orderId, $email, $name)
    {
        $config = AppModel::$app->getProperies();
        $data = ['emailTo' => $email, 'nameTo' => $name
            , 'emailFrom' => $config['email'], 'nameFrom' => $config['title']];

        ob_start();
        $cart = Session::get('cart');
        require RESOURCES . '/Sender/mailOrder.php';
        $template = ob_get_clean();

        Sender::sendMsg($config, $template, 'Order: ' . $orderId, $data);
    }

    /**
     * @param $orderId
     * @param $email
     * @param $name
     * @throws \Exception
     */
    public function mailOrderToAdmin($orderId, $email, $name)
    {
        $config = AppModel::$app->getProperies();
        $data = ['emailFrom' => $email, 'nameFrom' => $name
            , 'emailTo' => $config['email'], 'nameto' => $config['title']];

        ob_start();
        $cart = Session::get('cart');
        require RESOURCES . '/Sender/mailOrder.php';
        $template = ob_get_clean();

        Sender::sendMsg($config, $template, 'Order: ' . $orderId, $data);
    }
}