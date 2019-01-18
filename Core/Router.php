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

    private static function setUrl()
    {
        // Get the current URL, differents depending on platform/server software
        if (!empty($_SERVER['REQUEST_URL'])) {
            self::$url = $_SERVER['REQUEST_URL'];
        } else {
            self::$url = $_SERVER['REQUEST_URI'];
        }
        self::$url = rtrim(self::$url, '/');

    }

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function matchRoute()
    {
        self::setUrl();


        //$pattern - query, $route - controller+action
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("~$pattern~i", self::$url)) {
                self::$route = [];
                foreach ($route as $key => $value) {
                    self::$route[$key] = $value;
                }

                if(!isset(self::$route['controller'])) {
                    self::$route['controller']='MainController';
                }else{
                    self::$route['controller'] = self::upperCamelCase($route['controller']) . "Controller";
                }

                if(!isset(self::$route['action'])){
                    self::$route['action']='indexAction';
                }else{
                    self::$route['action']=self::lowerCamelCase($route['action'])."Action";
                }

                if (!isset(self::$route['prefix'])){
                    self::$route['prefix']='';
                }else {
                    self::$route['prefix']=self::upperCamelCase(self::$route['prefix']).'\\';
                }

                return true;
            }
        }
        return false;
    }

    public static function dispatch()
    {
        self::setUrl();
        var_dump(self::$url);
        $query=explode('&',$_SERVER['QUERY_STRING']);
        $params["url"]=$query[0];

        if (self::matchRoute()){
            $controller='Components\Controllers\\'.self::$route['prefix'].self::$route['controller'];

            if(class_exists($controller)){
                $cObj=new $controller();
                $action=self::$route['action'];
                if(method_exists($cObj,$action)){
                    $cObj->$action($params);
                }
                else{
                    echo "BADACTION";
                }
            }
            else{
                echo "BAD";
            }

        }else{
            http_response_code(404);
            include dirname(__FILE__,3).'/resources/home/404.php';
        }
    }

    private static function upperCamelCase($name):string
    {
        $name=str_replace('-',' ', $name);
        $name=ucfirst($name);
        $name=str_replace(' ','',ucfirst($name));
        return $name;
    }
    private static function lowerCamelCase($name):string
    {
        $name=str_replace('-',' ', $name);
        $name=ucfirst($name);
        $name=str_replace(' ','',ucfirst($name));
        return lcfirst($name);
    }
}