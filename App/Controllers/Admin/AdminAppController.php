<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\App;
use App\Models\Admin\AdminModel;
use Core\Session;

/**
 * Class AdminAppController
 * @package App\Controllers\Admin
 */
class AdminAppController extends Controller
{
    protected $admins=[];
    protected $admin;

    /**
     * AdminAppController constructor.
     * @param $route
     * @throws \Exception
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->setMeta(App::$app->getProperty('title'), 'Admin', 'admin');
        $this->layout = 'Admin/default';
        $this->admins=AdminModel::getAdmins();
        $this->admin=Session::get('user');
    }
}