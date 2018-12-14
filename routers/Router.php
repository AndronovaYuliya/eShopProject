<?php
class Router
{
    public function __construct()
    {
        echo "Router";
        die();
    }

    private static $url;
    public static function setUrl($url='/')
    {
        self::$url=ParseURLModel::parseUrl($url);

    }
    function ErrorPage404()
    {
        /*$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');*/
    }

    /*
     * Route::get('user/{id}/profile', function ($id) {
           //
        })->name('profile');

        $url = route('profile', ['id' => 1]);*/


    static public function routing(/*string, $callback (function or UserController@index)*/){


        /*echo "<pre>";
        var_dump($_SERVER)
;        echo "</pre>";*/

    }
    static function get(/*string, $callback (function or UserController@index)*/){}
    static function post($uri, $callback){}
    static function put($uri, $callback){}
    static function patch($uri, $callback){}
    static function delete($uri, $callback){}
    static function options($uri, $callback){}
    static function match(/*['get', 'post'] , '/', function () {}*/){}
    static function any(/*'foo', function () {}*/){}
    static function group(){}
    //Redirect Routes
    static function redirect(/*'/here', '/there',301*/){}
    static function permanentRedirect(/*'/here', '/there',301*/){}
    //view routers
    static function view(/*'/welcome', 'welcome', ['name' => 'Taylor']*/){}
    //Route Prefixes
    /*Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
      });*/
    /*
     * $route = Route::current();

        $name = Route::currentRouteName();

        $action = Route::currentRouteAction();*/

}