<?php

namespace App\Controllers\Admin;

use Core\Authorization;
use Core\View;
use App\Models\Admin\AdminModel;
use Core\Session;

/**
 * Class MainController
 * @package App\Controllers\Admin
 */
class AdminMainController extends AdminAppController
{
    /**
     * @throws \Exception
     */
    public function indexAction()
    {
        $this->route = ["controller" => "Admin/Main", "action" => "index"];
        $this->layout = 'Admin/default';
        $this->view = 'index';
    }

    /**
     * @throws \Exception
     */
    public function loginAction()
    {
        if (Authorization::isAuth('email')) {
            $this->route = ["controller" => "Admin/Page", "action" => "page"];
            $this->layout = 'Admin/default';
            $this->view = 'page';
            // $this->set(compact('products', 'categories', 'brands'));
            return;
        }

        if (empty($_POST) && $_SERVER['REQUEST_METHOD'] != 'POST') {
            Session::set('errors', 'Enter email and password');
            $this->route = ["controller" => "Admin/Main", "action" => "index"];
            $this->layout = 'Admin/default';
            $this->view = 'index';
            $session = Session::sessionRead();
            $this->set(compact('session'));
            return;
        }

        $this->data = AdminModel::login($_POST);

        if (array_key_exists('errors', $this->data)) {
            Session::set('errors', $this->data['errors']);
            $this->route = ["controller" => "Admin/Main", "action" => "index"];
            $this->layout = 'Admin/default';
            $this->view = 'index';
            $session = Session::sessionRead();
            $this->set(compact('session'));
            return;
        }

        if (array_key_exists('user', $this->data)) {
            Session::delete('errors');
            Authorization::login('email', $this->data['user'][0]['email']);
            Session::set('user', $this->data['user'][0]);
            $this->route = ["controller" => "Admin/Page", "action" => "page"];
            $this->layout = 'Admin/default';
            $this->view = 'page';
        }
    }

    /**
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View($this->route, $this->layout, $this->view);
        $viewObj->rendor([]);
    }
}