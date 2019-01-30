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
     * @return void
     */
    private function settingsIndex(): void
    {
        $this->route = ["controller" => "Admin/Main", "action" => "index"];
        $this->layout = 'Admin/default';
        $this->view = 'index';
    }

    /**
     * @return void
     */
    private function settingsPage(): void
    {
        $this->route = ["controller" => "Admin/Page", "action" => "page"];
        $this->layout = 'Admin/default';
        $this->view = 'page';
    }

    /**
     * @throws \Exception
     */
    public function indexAction()
    {
        $this->settingsIndex();
        $errors = Session::get('errors');
        $admin = $this->admin;
        $this->set(compact('errors', 'admin'));
    }

    /**
     * @throws \Exception
     */
    public function loginAction()
    {
        if (isset($_POST['enterSubmit']) || Authorization::isAuth('email')) {
            $this->sendDataWithoutErrors();
            return;
        }

        if (empty($_POST) && $_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->settingsIndex();
            $session = Session::sessionRead();
            $this->set(compact('session'));
            return;
        }

        $this->data = AdminModel::login($_POST);

        if (array_key_exists('errors', $this->data)) {
            Session::set('errors', $this->data['errors']);
            $this->settingsIndex();
            $errors = Session::get('errors');
            $this->set(compact('errors'));
            return;
        }

        if (array_key_exists('admin', $this->data)) {
            Session::delete('errors');
            Authorization::login('email', $this->data['admin'][0]['email']);
            Session::set('admin', $this->data['admin'][0]);

            $this->sendDataWithoutErrors();
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function logoutAction(): void
    {
        Authorization::logout();
        $this->settingsIndex();
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function getView(): void
    {
        $viewObj = new View($this->route, $this->layout, $this->view);
        $viewObj->rendor($this->data);
    }

    /**
     * @throws \Exception
     */
    public function editAction()
    {
        if (!Authorization::isAuth('email')) {
            Session::set('errors', 'Enter email and password');
            $this->settingsIndex();
            $session = Session::sessionRead();
            $this->set(compact('session'));
            return;
        }

        $data = AdminModel::edit($_POST);

        if (array_key_exists('errors', $data)) {
            Session::set('errors', $data['errors']);
            $this->sendDataWithErrors($data['errors']);
            return;
        }

        Session::delete('errors');
        $this->admin = AdminModel::updateAdmin($data['admin'], Session::get('admin', 'id'));
        Session::set('admin', $this->admin);

        $this->sendDataWithoutErrors();
    }

    /**
     * @throws \Exception
     */
    public function signupAction()
    {
        if (!Authorization::isAuth('email')) {
            Session::set('errors', 'Enter email and password');
            $this->settingsIndex();

            $session = Session::sessionRead();
            $this->set(compact('session'));
            return;
        }
        $result = AdminModel::add($_POST);

        if (isset($result['errors'])) {
            $errors = $result['errors'];
        }

        $this->sendDataWithoutErrors();
    }

    /**
     * @throws \Exception
     */
    public function deleteAction()
    {
        if (!Authorization::isAuth('email') || !isset($_POST)) {
            Session::set('errors', 'Enter email and password');
            $this->settingsIndex();

            $this->set(compact('session'));
            return;
        }
        AdminModel::delete('id', $_POST["adminUserDelete"]);
        $this->sendDataWithoutErrors();
    }

    /**
     * @throws \Exception
     */
    public function tableDeleteAction()
    {
        if (!Authorization::isAuth('email') || !isset($_POST)) {
            Session::set('errors', 'Enter email and password');
            $this->settingsIndex();

            $this->set(compact('session'));
            return;
        }
        foreach ($_POST as $key => $value) {
            $data = stristr($key, '?');
            if ($data) {
                $table[substr($data, 1)] = $value;
            }
        }
        if (!AdminModel::deleteFromTable($table)) {
            $errors = "Nothing to delete";
        }

        $this->sendDataWithErrors($errors);
    }

    /**
     * @throws \Exception
     */
    public function tableAddAction()
    {
        if (!Authorization::isAuth('email') || !isset($_POST)) {
            Session::set('errors', 'Enter email and password');
            $this->settingsIndex();

            $this->set(compact('session'));
            return;
        }
        $data = self::explodeData($_POST);
        $result = AdminModel::addTableData($data);
        if ($result !== true) {
            $errors = $result;
        }
        $this->sendDataWithErrors($errors);
    }

    /**
     * @throws \Exception
     */
    public function tableEditAction()
    {
        if (!Authorization::isAuth('email') || !isset($_POST)) {
            Session::set('errors', 'Enter email and password');
            $this->settingsIndex();

            $this->set(compact('session'));
            return;
        }
        unset($_POST['tableEdit']);
        foreach ($_POST as $key => $value) {
            $data = stristr($key, '?');
            if ($data) {
                $tableKey = substr($data, 1);
                $table[$tableKey] = [];
                $id = $value;
                unset($_POST[$key]);
            }
        }
        foreach ($_POST as $key => $value) {
            $table[$tableKey][$key] = $value;
        }
        $result = AdminModel::editTableData($table, $id);

        if ($result !== true) {
            $errors = $result;
        }
        $this->sendDataWithErrors($errors);
    }

    /**
     * @param array $data
     * @return array
     */
    private function explodeData(array $data): array
    {
        $name = explode('?', key($_POST))[0];
        $table[$name][] = 0;
        foreach ($_POST as $key => $value) {
            $table[$name][explode('?', $key)[1]] = $value;
        }
        return $table;
    }

    /**
     * @param $errors
     * @throws \Exception
     */
    private function sendDataWithErrors($errors)
    {
        $this->settingsPage();
        $this->updateDatas();

        $admins = $this->admins;
        $this->admin = Session::get('admin');
        $admin = $this->admin;
        $tables = $this->tables;
        $additionals = $this->additionals;
        $attributes = $this->attributes;
        $attributes_values = $this->attributes_values;
        $categories = $this->categories;
        $categories_attributes = $this->categories_attributes;
        $clients = $this->clients;
        $comments = $this->comments;
        $images = $this->images;
        $key_words = $this->key_words;
        $orders = $this->orders;
        $products = $this->products;
        $products_images = $this->products_images;
        $products_key_words = $this->products_key_words;
        $sessions = $this->sessions;
        $users = $admins;
        $this->set(compact('admin', 'admins', 'tables', 'additionals', 'attributes',
            'attributes_values', 'categories', 'categories_attributes', 'clients', 'comments',
            'images', 'key_words', 'orders', 'products', 'products_images', 'products_key_words',
            'sessions', 'users', 'errors'));
    }

    /**
     * @throws \Exception
     */
    private function sendDataWithoutErrors()
    {
        $this->settingsPage();
        $this->updateDatas();

        $admins = $this->admins;
        $this->admin = Session::get('admin');
        $admin = $this->admin;
        $tables = $this->tables;
        $additionals = $this->additionals;
        $attributes = $this->attributes;
        $attributes_values = $this->attributes_values;
        $categories = $this->categories;
        $categories_attributes = $this->categories_attributes;
        $clients = $this->clients;
        $comments = $this->comments;
        $images = $this->images;
        $key_words = $this->key_words;
        $orders = $this->orders;
        $products = $this->products;
        $products_images = $this->products_images;
        $products_key_words = $this->products_key_words;
        $sessions = $this->sessions;
        $users = $admins;
        $this->set(compact('admin', 'admins', 'tables', 'additionals', 'attributes',
            'attributes_values', 'categories', 'categories_attributes', 'clients', 'comments',
            'images', 'key_words', 'orders', 'products', 'products_images', 'products_key_words',
            'sessions', 'users'));
    }
}