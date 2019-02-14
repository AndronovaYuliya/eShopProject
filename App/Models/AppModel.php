<?php

namespace App\Models;

use App\Controllers\SenderController;
use Core\App;
use App\Controllers\ShopController;
use App\Controllers\UsersController;
use App\Controllers\CartController;
use App\Controllers\MainController;
use App\Controllers\ProductController;
use App\Controllers\Admin\AdminMainController;
use Core\Router;

/**
 * Class AppModel
 * @package App\Models
 */
class AppModel extends App
{
    public static $sender;

    /**
     * AppModel constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        self::$sender = SenderController::getInstance();
        parent::__construct();
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
}