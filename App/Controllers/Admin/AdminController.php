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

    /**
     * @return void
     */
    public function indexAction(): void
    {
        parent::action_index('admin/adminView.php', $this->data);
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

    /**
     * @return void
     */
    public function loginAction(): void
    {
        if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->data['admin'] = AdminModel::login($_POST);
            if (empty($this->data['admin']['errors'])) {
                $this->user = $this->data['admin']['user'];
                parent::action_index('admin/userView.php', $this->data['admin']['user']);
            } else {
                parent::action_index('admin/adminView.php', $this->data['admin']);
            }
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
            $data = AdminModel::signup($_POST);

            $this->data['admin'] = $data['user'];
            $this->data['errors'] = $data['errors'];

            if (empty($this->data['errors'])) {
                if (AdminModel::checkUnique('login', $this->data['admin']['adminLogin'])) {
                    $this->data['errors'] = 'This login is occupied';
                }

                if (AdminModel::checkUnique('email', $this->data['admin']['adminEmail'])) {
                    $this->data['errors'] = 'This email is occupied';
                }
            } else {
                parent::action_index('admin/userView.php', $this->data);
            }
            if (empty($this->data['errors'])) {
                AdminModel::addUser($this->data['admin']);
                parent::action_index('admin/userView.php', $this->data);
            }
        }
    }

    /**
     * @return void
     */
    public function editAction(): void
    {
        if (!empty($_POST)) {
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