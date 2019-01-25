<?php

namespace App\Controllers;

use Core\Model;
use Core\Controller;

/**
 * Class AppController
 * @package App\Controllers
 */
class AppController extends Controller
{
    /**
     * AppController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);
        new Model();
    }
}