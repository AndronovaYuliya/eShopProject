<?php

namespace App\Controllers;

use Core\Model;
use Core\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new Model();
    }

}