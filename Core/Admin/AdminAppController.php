<?php

namespace Core\Admin;

use Core\Controller;
use Core\App;

/**
 * Class AppAdminController
 * @package App\Controllers\Admin
 */
class AdminAppController extends Controller
{
    protected $data = [];
    protected $users = [];
    protected $tables = [];

    /**
     * AppAdminController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);

        $this->users = AdminModel::getUsers();
        $this->tables=TableModel::query();

        $this->setMeta(App::$app->getProperty('title'), 'Admin');
    }
}