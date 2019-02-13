<?php

namespace Core;

use App\Controllers\SenderController;
use App\Controllers\ShopController;
use App\Controllers\UsersController;
use App\Controllers\CartController;
use App\Controllers\MainController;
use App\Controllers\ProductController;
use App\Controllers\Admin\AdminMainController;

class App
{
    public static $app;
    public $faker;
    public static $sender;
    protected $route = [];

    /**
     * App constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        self::$app = Registry::getInstance();
        self::$sender = SenderController::getInstance();

        $this->getParams();
        Session::start();

        new MyException();
        // Get the current URL, differents depending on platform/server software
        if (!empty($_SERVER['REQUEST_URL'])) {
            $query = trim($_SERVER['REQUEST_URL'], '/');
        } else {
            $query = trim($_SERVER['REQUEST_URI'], '/');
        }
        $this->route = Router::dispatch($query);
        $this->routeAction();
    }

    /**
     * @return void
     */
    protected function getParams(): void
    {
        $params = parse_ini_file(CONF . '/config.ini');
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
    }

    protected function routeAction()
    {
        if (is_string($this->route)) {
            throw new \Exception("Page {$this->route} not found", 404);
        }

        $controller = 'App\Controllers\\' . $this->route['prefix'] . $this->route['controller'] . 'Controller';

        if (!class_exists($controller)) {
            throw new \Exception("Controller {$controller} not found", 404);
        }

        $cObj = new $controller($this->route);

        $action = $this->route['action'] . 'Action';
        if (!method_exists($cObj, $action)) {
            throw new \Exception("Action {$action} not found", 404);
        }
        $cObj->$action($this->route['query']);
    }
}