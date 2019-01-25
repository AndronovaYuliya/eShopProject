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
    public static function matchRoute($url): bool
    {
        //$pattern - query, $route - controller+action
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("~$pattern~i", $url)) {
                self::$route = [];

                foreach ($route as $key => $value) {
                    self::$route[$key] = $value;
                }

                if (!isset(self::$route['action'])) {
                    self::$route['action'] = 'index';
                } else {
                    self::$route['action'] = self::lowerCamelCase($route['action']);
                }

                if (!isset(self::$route['prefix'])) {
                    self::$route['prefix'] = '';
                } else {
                    self::$route['prefix'] = self::upperCamelCase(self::$route['prefix']) . '\\';
                }

                if (!isset(self::$route['controller'])) {
                    self::$route['controller'] = 'Main';
                } else {
                    self::$route['controller'] = self::upperCamelCase($route['controller']);
                }
                return true;
            }
        }
        return false;
    }

    /**
     * @param $url
     * @throws \Exception
     */
    public static function dispatch($url): void
    {
        $url = self::removeQueryString($url);

        if (!self::matchRoute($url)) {
            throw new \Exception("Page not found", 404);
        }
        $controller = 'App\Controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';

        if (!class_exists($controller)) {
            throw new \Exception("Controller not found", 404);
        }

        $cObj = new $controller(self::$route);

        $action = self::$route['action'] . 'Action';
        if (method_exists($cObj, $action)) {
            $cObj->$action();
            $cObj->getView();
        } else {
            throw new \Exception("Action not found", 404);
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

    private static function removeQueryString($url)
    {
        if (!$url) {
            return '';
        }

        $params = explode('?', $url, 2);
        if (false !== strpos($params[0], '=')) {
            return '';
        }

        return rtrim($params[0], '/');
    }
}