<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\AdminModel;

class AdminController extends Controller
{
    private $data = [];

    public function indexAction()
    {
        parent::action_index('admin/adminView.php', $this->data);
    }

    public function userAction()
    {
        //check
        parent::action_index('admin/userView.php', $this->data);
    }

    public function tableAction()
    {
        parent::action_index('admin/tableView.php', $this->data);
    }

    //logib
    public function loginAction()
    {
        if (!empty($_POST)) {
            $admin = new AdminModel();
            $errors = $admin->load($_POST);
            if (empty($errors)) {
                parent::action_index('admin/userView.php', $this->data);
            } else {
                var_dump($errors);
                die();
                //parent::action_index('admin/userView.php', $errors);
            }
        }
    }

    //logout
    public function logoutAction()
    {
        parent::action_index('admin/adminView.php', $this->data);
    }

    //registration
    public function signupAction()
    {
        $admin = new AdminModel();
        $errors = $admin->load($_POST);
        if (!empty($_POST)) {

        }
        die();
    }
}