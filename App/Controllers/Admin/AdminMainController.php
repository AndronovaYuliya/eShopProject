<?php

namespace App\Controllers\Admin;

use Core\Authorization;
use Core\View;
use App\Models\Admin\AdminModel;
use Core\Session;

/**
 * Class MainController
 * @package AppModel\Controllers\Admin
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
    public function indexAction(): void
    {
        $this->settingsIndex();
        $errors = Session::get('errors');
        $admin = $this->admin;
        $this->set(compact('errors', 'admin'));
        $this->getView();
    }

    /**
     * @throws \Exception
     */
    public function loginAction(): void
    {
        if ((isset($_POST['enterSubmit']) && Authorization::isAuth('admin')) || Authorization::isAuth('admin')) {
            $this->sendDataWithoutErrors();
        }

        if (empty($_POST) && $_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->settingsIndex();
            $session = Session::sessionRead();
            $this->set(compact('session'));
            $this->getView();
        }

        $this->data = AdminModel::login($_POST);

        if (array_key_exists('errors', $this->data)) {
            Session::set('errors', $this->data['errors']);
            $this->settingsIndex();
            $errors = Session::get('errors');
            $this->set(compact('errors'));
            $this->getView();
        }

        if (array_key_exists('admin', $this->data)) {
            Session::delete('errors');
            Authorization::login('admin', $this->data['admin'][0]);

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
     * @return void
     */
    public function editAction(): void
    {
        if (!Authorization::isAuth('admin')) {
            Session::set('errors', 'Enter email and password');
            $this->settingsIndex();
            $session = Session::sessionRead();
            $this->set(compact('session'));
            $this->getView();
        }

        $data = AdminModel::edit($_POST);

        if (array_key_exists('errors', $data)) {
            Session::set('errors', $data['errors']);
            $this->sendDataWithErrors($data['errors']);
            $this->getView();
        }

        Session::delete('errors');
        $this->admin = AdminModel::updateAdmin($data['admin'], Session::get('admin', 'id'));
        Session::set('admin', $this->admin);

        $this->sendDataWithoutErrors();
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function signupAction(): void
    {
        if (!Authorization::isAuth('admin')) {
            Session::set('errors', 'Enter email and password');
            $this->settingsIndex();

            $session = Session::sessionRead();
            $this->set(compact('session'));
            $this->getView();
        }
        $result = AdminModel::add($_POST);

        if (isset($result['errors'])) {
            $this->sendDataWithErrors($result['errors']);
        }

        $this->sendDataWithoutErrors();
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function deleteAction(): void
    {
        if (!$this->checkAuthorization()) {
            $this->getView();
        }

        AdminModel::delete('id', $_POST["adminUserDelete"]);
        $this->sendDataWithoutErrors();
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function tableDeleteAction(): void
    {
        if (!$this->checkAuthorization()) {
            $this->getView();
        }

        foreach ($_POST as $key => $value) {
            $data = stristr($key, 'adminTable?');
            if ($data) {
                $keyTable = explode('?', $data)[1];
                $table[$keyTable] = $value;
                break;
            }
        }
        if (!AdminModel::deleteFromTable($table)) {
            $errors = "Nothing to delete";
            $this->sendDataWithErrors($errors);
        }
        $this->sendDataWithoutErrors();
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function tableAddAction(): void
    {
        if (!$this->checkAuthorization()) {
            $this->getView();
        }

        foreach ($_POST as $key => $value) {
            $data = stristr($key, '?');
            if ($data) {
                $tableKey = substr($data, 1);
                $table[$tableKey] = [];
                unset($_POST[$key]);
                break;
            }
        }
        foreach ($_POST as $key => $value) {
            $table[$tableKey][$key] = $value;
        }
        $result = AdminModel::addTableData($table);
        if ($result !== true) {
            $errors = $result;
            $this->sendDataWithErrors($errors);
        }
        $this->sendDataWithoutErrors();
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function tableEditAction(): void
    {
        if (!$this->checkAuthorization()) {
            $this->getView();
        }

        foreach ($_POST as $key => $value) {
            $data = stristr($key, '?');
            if ($data) {
                $tableKey = substr($data, 1);
                $table[$tableKey] = [];
                $id = $_POST['id'];
                unset($_POST[$key]);
                unset($_POST['id']);
                break;
            }
        }
        foreach ($_POST as $key => $value) {
            $table[$tableKey][$key] = $value;
        }
        $result = AdminModel::editTableData($table, $id);

        if ($result !== true) {
            $errors = $result;
            $this->sendDataWithErrors($errors);
        }
        $this->sendDataWithoutErrors();
    }

    /**
     * @param $errors
     * @throws \Exception
     * @return void
     */
    private function sendDataWithErrors($errors): void
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
        $this->getView();
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function sendDataWithoutErrors(): void
    {
        $this->settingsPage();
        $this->updateDatas();

        $admins = $this->admins;
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
        $this->getView();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    private function checkAuthorization(): bool
    {
        if (!Authorization::isAuth('admin') || !isset($_POST)) {
            Session::set('errors', 'Enter email and password');
            $this->settingsIndex();

            $this->set(compact('session'));
            return false;
        }
        return true;
    }
}