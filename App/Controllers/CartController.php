<?php

namespace App\Controllers;

use App\Mappers\ClientsMapper;
use App\Models\AppModel;
use App\Models\CartModel;
use App\Models\OrdersModel;
use App\Mappers\ProductsMapper;
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
        $brands = $products;
        $products = ProductsModel::getInstance()->getImages($products);
        $products = ProductsModel::getInstance()->getCategories($products);
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
            $product = ProductsMapper::getInstance()->findOne('id=:id', [':id' => $id]);
        }
        if (!$product) {
            return false;
        }

        $table = CartModel::addToCart($product, $qty);

        echo json_encode($table);
        exit();
    }

    /**
     * @throws \Exception
     */
    public function getQtyTotalAction()
    {
        echo Session::getData('cart', 0)['qtyTotal'];
        exit();
    }

    /**
     * @throws \Exception
     */
    public function getTotalAction()
    {
        echo '$ ' . Session::getData('cart', 0)['total'];
        exit();
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
        exit();
    }

    /**
     * @throws \Exception
     */
    public function removeProductAction()
    {
        Session::deleteData('cart', $_POST['id']);
        $table = CartModel::printCart();
        echo json_encode($table);
        exit();
    }

    /**
     * @throws \Exception
     */
    public function checkoutAction()
    {
        if (!Authorization::isAuth('login')) {
            echo 'You are not logged';
            exit();
        }
        if (!Session::get('cart')) {
            echo 'The cart is empty';
            exit();
        }
        echo json_encode(true);
    }

    /**
     * @throws \Exception
     */
    public function saveOrderAction()
    {
        $login = Session::get('login');
        $client = ClientsMapper::getInstance()->findOne('login=:login', [':login' => $login]);
        $orderId = OrdersModel::saveOrder($client);
        $client['email'] = 'andronovayuliyatest@gmail.com';
        AppModel::$sender->mailOrder($orderId, $client['email'], $client['name']);
        AppModel::$sender->mailOrderToAdmin($orderId, $client['email'], $client['name']);
    }

    /**
     * @throws \Exception
     */
    public function checkCartAction()
    {
        if (Session::get('cart')) {
            echo json_encode(true);
            exit();
        }
        echo json_encode(false);
        exit();
    }

    /**
     * @throws \Exception
     */
    public function orderDetailAction()
    {
        $id = $_POST['id'];
        if ($id) {
            echo json_encode(OrdersModel::orderDetail($id));
            exit();
        }
        echo json_encode(false);
        exit();
    }
}