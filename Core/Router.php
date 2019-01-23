<?php

namespace Core;

use phpDocumentor\Reflection\Types\Self_;
use App\Controllers\CartController;
use App\Controllers\MainController;
use App\Controllers\ProductController;

class Router
{
    protected static $routes = [];
    protected static $route = [];
    protected static $url = '';

    /**
     * @return void
     */
    private static function setUrl(): void
    {
        // Get the current URL, differents depending on platform/server software
        if (!empty($_SERVER['REQUEST_URL'])) {
            self::$url = $_SERVER['REQUEST_URL'];
        } else {
            self::$url = $_SERVER['REQUEST_URI'];
        }
        self::$url = rtrim(self::$url, '/');

    }

    /**
     * @param $regexp
     * @param array $route
     * @return void
     */
    public static function add($regexp, array $route = []): void
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * @return array
     */
    public static function getRoutes(): array
    {
        return self::$routes;
    }

    /**
     * @return array
     */
    public static function getRoute(): array
    {
        return self::$route;
    }

    /**
     * @return bool
     */
    public static function matchRoute(): bool
    {
        self::setUrl();

        //$pattern - query, $route - controller+action
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("~$pattern~i", self::$url)) {
                self::$route = [];
                foreach ($route as $key => $value) {
                    self::$route[$key] = $value;
                }

                if (!isset(self::$route['controller'])) {
                    self::$route['controller'] = 'MainController';
                } else {
                    self::$route['controller'] = self::upperCamelCase($route['controller']) . "Controller";
                }

                if (!isset(self::$route['action'])) {
                    self::$route['action'] = 'indexAction';
                } else {
                    self::$route['action'] = self::lowerCamelCase($route['action']) . "Action";
                }

                if (!isset(self::$route['prefix'])) {
                    self::$route['prefix'] = '';
                } else {
                    self::$route['prefix'] = self::upperCamelCase(self::$route['prefix']) . '\\';
                }
                return true;
            }
        }
        return false;
    }

    /**
     * @return void
     */
    public static function dispatch(): void
    {
        self::setUrl();
        $query = explode('&', $_SERVER['QUERY_STRING']);
        $params["url"] = $query[0];

        if (!self::matchRoute()) {
            http_response_code(404);
            include dirname(__FILE__, 3) . '/resources/home/404.php';
        }

        $controller = 'App\Controllers\\' . self::$route['prefix'] . self::$route['controller'];

        if (!class_exists($controller)) {
            echo "BAD";
            die();
        }

        $cObj = new $controller();
        $action = self::$route['action'];
        if (method_exists($cObj, $action)) {
            $cObj->$action($params);
        } else {
            echo "BADACTION";
        }
    }

    /**
     * @param $name
     * @return string
     */
    private static function upperCamelCase($name): string
    {
        $name = str_replace('-', ' ', $name);
        $name = ucfirst($name);
        $name = str_replace(' ', '', ucfirst($name));

        return $name;
    }

    /**
     * @param $name
     * @return string
     */
    private static function lowerCamelCase($name): string
    {
        $name = str_replace('-', ' ', $name);
        $name = ucfirst($name);
        $name = str_replace(' ', '', ucfirst($name));

        return lcfirst($name);
    }
}