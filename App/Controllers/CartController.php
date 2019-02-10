<?php

namespace App\Controllers;

use App\Mappers\ClientsMapper;
use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\ProductsModel;
use Core\Authorization;
use Core\Session;
use Core\View;

/**
 * Class CartController
 * @package App\Controllers
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
        $brands = $this->brands;
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
        } else {
            echo json_encode(true);
        }
    }

    /**
     * @throws \Exception
     */
    public function saveOrderAction()
    {
        $login = Session::get('login');
        $client = ClientsMapper::getDataWhere('login', $login);
        $orderId = OrderModel::saveOrder($client[0]);
        OrderModel::mailOrder($orderId, $orderId[0]['email']);
    }
}