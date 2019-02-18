<?php

namespace App\Controllers;

use App\Mappers\ClientsMapper;
use App\Mappers\OrdersMapper;
use App\Models\ProductsModel;
use Core\Authorization;
use Core\Session;
use Core\View;

/**
 * Class AccountController
 * @package AppModel\Controllers
 */
class AccountController extends AppController
{
    /**
     * @throws \Exception
     */
    public function accountAction()
    {
        $products = $this->products;
        $categories = $this->categories;
        $brands = $products;
        $products = ProductsModel::getInstance()->getImages($products);
        $products = ProductsModel::getInstance()->getCategories($products);

        if (!Authorization::isAuth('login')) {
            Session::set('errors', 'You are not logged');
            $this->set(compact('products', 'categories', 'brands', 'session'));
            $this->getView();
        }
        $login = Session::get('login');
        if ($login) {
            $client = ClientsMapper::getInstance()->findOne('login=:login', [':login' => $login]);
        }
        $session = Session::getSession();
        $orders = OrdersMapper::getInstance()->findAll('id_client=:id_client', [':id_client' => $client['id']]);

        $this->set(compact('products', 'categories', 'brands', 'client', 'session', 'orders'));
        $this->getView();
    }

    /**
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Account", "action" => "account"], 'Site/default', 'account');
        $viewObj->rendor($this->data);
    }
}