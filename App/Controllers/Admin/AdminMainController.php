<?php

namespace App\Controllers\Admin;

use Core\Admin\AdminAppController;
use Core\View;

/**
 * Class MainController
 * @package App\Controllers\Admin
 */
class AdminMainController extends AdminAppController
{
    public function indexAction()
    {
        echo "ADMIN";die();
        if (Authorization::isAuth('email')) {
            //go to main
        }
    }
}