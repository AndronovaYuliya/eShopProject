<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\AdminModel;

class AdminController extends Controller
{
    private $data=[];
    public function indexAction()
    {
        parent::action_index('admin/adminView.php',$this->data);
    }

    public function userAction()
    {
        //check
        parent::action_index('admin/userView.php',$this->data);
    }

    public function tableAction()
    {
        parent::action_index('admin/tableView.php',$this->data);
    }

    //logout
    public function loginAction()
    {
        if (AdminModel::verify()) {
            parent::action_index('admin/userView.php',$this->data);
        }
    }

    //logout
    public function logoutAction()
    {
        parent::action_index('admin/adminView.php',$this->data);
    }

    //registration
    public function signupAction()
    {
        echo "AdminSignup"; die();
    }
}