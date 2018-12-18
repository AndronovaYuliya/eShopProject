<?php
class router
{
    private static $_needle='Controller';
    private static $nameController;
    private static $nameAction;
    private static $requestMethod;
    private static $data=[];
    private static $singleProduct;
    private static $query=[];

    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host);
        //header('Location:'.$host.'404');
    }

    /*
     * routing
     */
    public static function routing()
    {
        self::parseUrl();

        //'/'
        if (self::$nameController=='Controller')
        {
            self::$nameController='MainController';
        }
        $action = self::$nameAction;
        $controller =self::$nameController;
        $currentController=new $controller();

        if(!$action)
        {
            $action='show';
        }

        //+обработать ошибку
        //single product

        //Shop
        if(!self::$query)
        {
            $currentController->$action();
        }

        elseif(self::$query)
        {
            $currentController->$action(self::$query);
                //if()
                //elseif(method_exists($controller, self::$query))
                //self::$singleProduct = $controller::$action(self::$query);
                // $singleProductView=new SingleproductController();
                // $singleProductView->actionIndex(self::$data,self::$singleProduct);

        }

        else
        {
            // кинуть исключение
            self::ErrorPage404();
        }
    }

    /*
     * settings for router
     * */
    private static function parseUrl()
    {
        $arrayUrl=parse_url($_SERVER['REQUEST_URI']);

        //Parse path
        $path=explode('/',$arrayUrl['path']);
        array_shift($path);

        self::$nameController=ucfirst(array_shift($path)).self::$_needle;

        self::$nameAction= array_shift($path);

        self::$requestMethod=$_SERVER['REQUEST_METHOD'];

        //Parse query
        if(array_key_exists('query', $arrayUrl))
        {
            $query = explode(',',$arrayUrl['query']);

            self::$query=[];

            foreach ($query as $key=>$value)
            {
                $queryItem=explode('=',$value);
                self::$query[$queryItem[0]]=$queryItem[1];
            }
        }
    }
}