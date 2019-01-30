<?php

namespace App\Controllers;

use App\Mappers\ClientsMapper;
use App\Models\ClientsModel;
use Core\Authorization;
use Core\Session;
use Core\View;

/**
 * Class AccountController
 * @package App\Controllers
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
        $brands = $this->brands;

        if (!Authorization::isAuth('login')) {
            Session::set('errors', 'You are not logged');
        }
        $login = Session::get('login');
        if ($login) {
            $client = ClientsModel::getDataWhere('login', $login);
        }
        $session = Session::getSession();

        $this->set(compact('products', 'categories', 'brands', 'client', 'session'));
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