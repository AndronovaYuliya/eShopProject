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
            Session::set('errors','Enter login and password');
            parent::action_index('/');
        }

        $this->data = AdminModel::login($_POST);

        if (array_key_exists('errors', $this->data)) {
            Session::set('errors',$this->data['errors']);
            parent::action_index('admin/adminView.php');
        }

        if (array_key_exists('user', $this->data)) {

            parent::action_index('admin/userView.php', $this->data['user']);
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
        if (!empty($_POST)) {
            //return back
            die();
        }

        $data = AdminModel::signup($_POST);

        $this->data['admin'] = $data['user'];
        $this->data['errors'] = $data['errors'];

        if (!empty($this->data['errors'])) {
            parent::action_index('admin/userView.php', $this->data);
        }

        if (AdminModel::checkUnique('login', $this->data['admin']['adminLogin'])) {
            $this->data['errors'] = 'This login is occupied';
        }

        if (AdminModel::checkUnique('email', $this->data['admin']['adminEmail'])) {
            $this->data['errors'] = 'This email is occupied';
        }

        if (empty($this->data['errors'])) {
            AdminModel::addUser($this->data['admin']);
            parent::action_index('admin/userView.php', $this->data);
        }
    }

    /**
     * @return void
     */
    public function editAction(): void
    {
        if (empty($_POST)) {
            //return back
            die();
        }

        $data = AdminModel::edit($_POST);

        $this->data['admin'] = $data['user'];
        $this->data['errors'] = $data['errors'];

        //from session id
        $id = 1;

        if (empty($this->data['errors'])) {
            AdminModel::updateUser($this->data['admin'], $id);
            parent::action_index('admin/userView.php', $this->data);
        }
        //from session add admin
        //parent::action_index('admin/userView.php', $this->data);
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