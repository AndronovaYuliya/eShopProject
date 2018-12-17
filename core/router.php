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

    public static function routing()
    {
        self::parseUrl();
        self::$data = ProductController::product();

        //+обработать ошибку
        //single product
        if(self::$nameController!=='Controller')
        {
            $controller =self::$nameController;
            $action = self::$nameAction;
            //Shop
            $currentController=new $controller();
            if(!self::$query)
            {
                $currentController->actionIndex(self::$data);
            }
            //напутано, переделать
            elseif(self::$query)
            {
               //            elseif(method_exists($controller, self::$query))
                self::$singleProduct = $controller::$action(self::$params, self::$query);
                $singleProductView=new SingleproductController();
                $singleProductView->actionIndex(self::$data,self::$singleProduct);

            }


            // root
            else
            {
                // кинуть исключение
                self::ErrorPage404();
            }
        }
        //all products
        else
        {
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
                $queryItem=explode('=',$value);
                self::$query[$queryItem[0]]=$queryItem[1];
            }
        }
    }
}