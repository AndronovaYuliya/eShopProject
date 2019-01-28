<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\App;

/**
 * Class AdminAppController
 * @package App\Controllers\Admin
 */
class AdminAppController extends Controller
{
    /**
     * AdminAppController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->setMeta(App::$app->getProperty('title'), 'Admin', 'admin');
        $this->layout = 'Admin/default';
    }
}