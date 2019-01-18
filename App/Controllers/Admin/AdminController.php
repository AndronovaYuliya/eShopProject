<?php

namespace App\Controllers\Admin;

use Core\Controller;

class AdminController extends Controller
{
    private $data=[];
    public function indexAction()
    {
        echo 5;die();
        parent::action_index('adminView.php',$this->data);
    }

    public function userAction()
    {
        //check
        parent::action_index('userView.php',$this->data);
    }

    public function tableAction()
    {
        parent::action_index('tableView.php',$this->data);
    }

    //logout
    public function loginAction()
    {
        echo "login"; die();
    }

    //logout
    public function logoutAction()
    {
        echo "logout"; die();
    }

    //registration
    public function signupAction()
    {
        echo "AdminSignup"; die();
    }
}