<?php

namespace App\Controllers;

use App\Mappers\UsersMapper;
use App\Models\ClientsModel;
use App\Models\ProductsModel;
use Core\Session;
use Core\View;
use Core\Authorization;
use http\Client;

/**
 * Class UserController
 * @package AppModel\Controllers
 */
class UsersController extends AppController
{
    /**
     * @throws \Exception
     */
    public function loginAction(): void
    {
        if (empty($_POST) && $_SERVER['REQUEST_METHOD'] != 'POST') {
            Session::set('errors', 'Enter login and password');
        }

        $client = ClientsModel::login($_POST);
        $products = $this->products;
        $categories = $this->categories;
        $brands = $products;
        $session = Session::getSession();
        $this->set(compact('products', 'categories', 'brands', 'client', 'session'));
        $this->getView();
    }

    /**
     * @throws \Exception
     */
    public function signupAction(): void
    {
        if (empty($_POST) && $_SERVER['REQUEST_METHOD'] != 'POST') {
            Session::set('errors', 'Enter data');
            echo json_encode(Session::get('errors'));
        }
        ClientsModel::signup($_POST);
        if (Session::get('errors')) {
            echo json_encode(Session::get('errors'));
        } else {
            echo json_encode("Welcome!");
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Main", "action" => "index"], 'Site/default', 'index');
        $viewObj->rendor($this->data);
    }

    /**
     * @throws \Exception
     */
    public function logoutAction(): void
    {
        if (!Authorization::isAuth('login')) {
            Session::set('errors', 'You are not logged');
        } else {
            Authorization::logout();
        }
        $products = $this->products;
        $categories = $this->categories;
        $brands = $this->brands;
        $session = Session::getSession();
        $this->set(compact('products', 'categories', 'brands', 'client', 'session'));
        $this->getView();
    }
}