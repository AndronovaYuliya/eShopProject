<?php

namespace Core;

use App\Controllers\ShopController;
use App\Controllers\UsersController;
use App\Controllers\CartController;
use App\Controllers\MainController;
use App\Controllers\ProductController;
use App\Controllers\Admin\AdminMainController;

/**
 * Class Router
 * @package Core
 */
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
     * @param $url
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

                if (!isset(self::$route['controller'])) {
                    self::$route['controller'] = 'Main';
                } else {
                    self::$route['controller'] = self::upperCamelCase($route['controller']);
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
     * @param $url
     * @return array|string
     */
    public static function dispatch($url)
    {
        $query = explode('?', $url);
        $query = isset($query[1]) ? $query[1] : null;

        $url = self::removeQueryString($url);

        if (!self::matchRoute($url)) {
            return $url;
        }
        self::$route['query'] = $query;
        return self::$route;
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

    /**
     * @param $url
     * @return string
     */
    private static function removeQueryString($url): string
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
