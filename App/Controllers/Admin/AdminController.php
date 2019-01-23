<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\AdminModel;
use Core\Session;
use Core\Authorization;

/**
 * Class AdminController
 * @package App\Controllers\Admin
 */
class AdminController extends Controller
{
    private $data = [];
    private $user;

    public function __construct()
    {
        Session::start();
    }

    /**
     * @return void
     */
    public function indexAction(): void
    {
        //check session
        parent::action_index('admin/adminView.php');
    }

    /**
     * @return void
     */
    public function userAction(): void
    {
        parent::action_index('admin/userView.php', $this->data);
    }

    /**
     * @return void
     */
    public function tableAction(): void
    {
        parent::action_index('admin/tableView.php', $this->data);
    }

    //andronovayuliyatest@gmail.com
    //2222
    /**
     * @return void
     */
    public function loginAction(): void
    {
        if (empty($_POST) && $_SERVER['REQUEST_METHOD'] != 'POST') {
            Session::set('errors', 'Enter login and password');
            parent::action_index('/');
        }

        $this->data = AdminModel::login($_POST);

        if (array_key_exists('errors', $this->data)) {
            Session::set('errors', $this->data['errors']);
            parent::action_index('admin/adminView.php');
        }

        if (array_key_exists('user', $this->data)) {
            Session::delete('errors');

            Authorization::login($this->data['user'][0]['email']);

            Session::set('user', $this->data['user'][0]);

            parent::action_index('admin/userView.php');
        }
    }

    /**
     * @return void
     */
    public function logoutAction(): void
    {
        parent::action_index('admin/adminView.php', $this->data);
    }

    /**
     * @return void
     */
    public function signupAction(): void
    {
        $this->data = AdminModel::signup($_POST);

        if (array_key_exists('errors', $this->data)) {
            Session::set('errors', $this->data['errors']);
            parent::action_index('admin/userView.php');
        }
        $result = AdminModel::checkUniqueAdmin($this->data);

        if ($result !== true) {
            Session::set('errors', $this->data['errors']);
            parent::action_index('admin/userView.php');
        }

        $this->data ['user'] = AdminModel::addUser($this->data['user']);

        parent::action_index('admin/userView.php', $this->data);
    }

    /**
     * @return void
     */
    public function editAction(): void
    {
        $this->data = AdminModel::edit($_POST);

        if (array_key_exists('errors', $this->data)) {
            Session::set('errors', $this->data['errors']);
            parent::action_index('admin/userView.php');
        }

        if (array_key_exists('user', $this->data)) {
            Session::delete('errors');

            $this->data ['user'] = AdminModel::updateUser($this->data['user'], $_SESSION['user']['id']);
            Session::set('user', $this->data['user']);
            Session::sessionRead();
            parent::action_index('admin/userView.php', $this->data);
        }
    }

    /**
     * @return void
     */
    public function deleteAction(): void
    {
        echo "delete";
        die();
    }
}