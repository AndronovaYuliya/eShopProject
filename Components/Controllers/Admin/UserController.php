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


}