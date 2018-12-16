<?php
class router
{
    private static $fileExtension='.php';
    private static $_needle='Controller';
    private static $nameController;
    private static $nameAction;
    private static $requestMethod;
    private static $params=[];
    private static $data=[];
    private static $query=[];

    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host);
        //header('Location:'.$host.'404');
    }

    public static function routing()
    {
        self::parseUrl();
        //+обработать ошибку
        if(self::$nameController!=='Controller')
        {
            $controller =self::$nameController;
            $action = self::$nameAction;
            if (method_exists($controller, $action))
            {
                self::$data = $controller::$action(self::$params, self::$query);

            }
            else
            {
                // кинуть исключение
                self::ErrorPage404();
            }
        }
        else
        {
            self::$data = ProductController::all();
            $mainView=new MainController();
            $mainView->actionIndex(self::$data);
        }

    }

    private static function parseUrl()
    {
        $arrayUrl=parse_url($_SERVER['REQUEST_URI']);

        //Parse path
        $path=explode('/',$arrayUrl['path']);
        array_shift($path);
        self::$nameController=ucfirst(array_shift($path)).self::$_needle;
        self::$nameAction= array_shift($path);
        self::$params= $path;
        self::$requestMethod=$_SERVER['REQUEST_METHOD'];

        //Parse query
        if(array_key_exists('query',$arrayUrl))
        {
            $query=explode(',',$arrayUrl['query']);
            self::$query=[];
            foreach ($query as $key=>$value)
            {
                $tmp=explode('=',$value);
                self::$query[$tmp[0]]=$tmp[1];
            }
        }
    }


    public static function view(/*'/welcome', 'welcome', ['name' => 'Taylor']*/){}
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