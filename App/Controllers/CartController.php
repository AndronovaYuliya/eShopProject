<?php

namespace App\Controllers;

use App\Mappers\ClientsMapper;
use App\Models\CartModel;
use App\Models\OrdersModel;
use App\Models\ProductsModel;
use Core\App;
use Core\Authorization;
use Core\Session;
use Core\View;
use Sender\Sender;

/**
 * Class CartController
 * @package AppModel\Controllers
 */
class CartController extends AppController
{
    /**
     * @throws \Exception
     */
    public function cartAction(): void
    {
        $products = $this->products;
        $categories = $this->categories;
        $brands =  $products;
        $table = CartModel::printCart();
        $this->setMeta('Cart');
        $this->set(compact('products', 'categories', 'brands', 'table'));
        $this->getView();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Cart", "action" => "cart"], 'Site/default', 'cart');
        $viewObj->rendor($this->data);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function addAction()
    {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $qty = !empty($_POST['qty']) ? $_POST['qty'] : 1;
        if ($id) {
            $product = ProductsModel::getDataWhere('id', $id);
        }
        if (!$product) {
            return false;
        }

        $table = CartModel::addToCart($product, $qty);

        echo json_encode($table);
    }

    /**
     * @throws \Exception
     */
    public function getQtyTotalAction()
    {
        echo Session::getData('cart', 0)['qtyTotal'];
    }

    /**
     * @throws \Exception
     */
    public function getTotalAction()
    {
        echo '$ ' . Session::getData('cart', 0)['total'];
    }

    /**
     * @throws \Exception
     */
    public function clearAction()
    {
        if (Session::get('cart')) {
            Session::delete('cart');
        }
        $table = CartModel::printCart();
        echo json_encode($table);
    }

    /**
     * @throws \Exception
     */
    public function removeProductAction()
    {
        Session::deleteData('cart', $_POST['id']);
        $table = CartModel::printCart();
        echo json_encode($table);
    }

    /**
     * @throws \Exception
     */
    public function checkoutAction()
    {
        if (!Authorization::isAuth('login')) {
            echo 'You are not logged';
            die();
        }
        if (!Session::get('cart')) {
            echo 'The cart is empty';
            die();
        }
        echo json_encode(true);
    }

    /**
     * @throws \Exception
     */
    public function saveOrderAction()
    {
        $login = Session::get('login');
        $client = ClientsMapper::getDataWhere('login', $login)[0];
        $orderId = OrdersModel::saveOrder($client);
        $client['email'] = 'andronovayuliyatest@gmail.com';
        App::$sender->mailOrder($orderId, $client['email'], $client['name']);
        App::$sender->mailOrderToAdmin($orderId, $client['email'], $client['name']);
    }

    /**
     * @throws \Exception
     */
    public function checkCartAction()
    {
        if (Session::get('cart')) {
            echo json_encode(true);
            die();
        }
        echo json_encode(false);
        die();
    }

    /**
     * @throws \Exception
     */
    public function orderDetailAction()
    {
        $id = $_POST['id'];
        if ($id) {
            echo json_encode(OrdersModel::orderDetail($id));
            die();
        }
        echo json_encode(false);
        die();
    }
}