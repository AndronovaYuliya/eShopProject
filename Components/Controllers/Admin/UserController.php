<?php

namespace Components\Controllers\Admin;

use Components\Core\Controller;

class UserController extends Controller
{
    private $data=[];
    public function indexAction()
    {
        parent::action_index('admin/user/index.php',$this->data);
    }

    public function userAction()
    {
        //check
        parent::action_index('admin/user/userView.php',$this->data);
    }

    public function tableAction()
    {
        parent::action_index('admin/user/tableView.php',$this->data);
    }
}