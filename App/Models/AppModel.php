<?php

namespace App\Models;

use App\Controllers\SenderController;
use App\Controllers\ShopController;
use App\Controllers\UsersController;
use App\Controllers\CartController;
use App\Controllers\MainController;
use App\Controllers\ProductController;
use App\Controllers\Admin\AdminMainController;
use Core\Router;
use Core\Session;
use Core\Registry;
use Core\Database;
use Core\MyException;

/**
 * Class AppModel
 * @package AppModel\Models
 */
class AppModel
{
    public static $app;
    public static $db;
    public $faker;
    protected $route = [];
    protected $query;
    public static $sender;

    /**
     * AppModel constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        self::$sender = SenderController::getInstance();
        self::$app = Registry::getInstance();
        $this->getParams();
        self::$db = Database::getInstance();
        Session::start();
        new MyException();
        if (!empty($_SERVER['REQUEST_URL'])) {
            $this->query = trim($_SERVER['REQUEST_URL'], '/');
        } else {
            $this->query = trim($_SERVER['REQUEST_URI'], '/');
        }
        $this->route = Router::dispatch($this->query);
        $this->routeAction();
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
}