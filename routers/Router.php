<?php
class Router
{
    private $fileExtension='.php';
    private $_needle='Controller';
    private $nameController;
    private $nameAction;
    private $requestMethod;
    private $params=[];
    private $data=[];
    private $query=[];

    public function __construct()
    {

    }


   /* public static function setUrl($url='/')
    {
        self::$url=ParseURLModel::parseUrl($url);

    }*/
    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host);
        //header('Location:'.$host.'404');
    }

    /*
     * Route::get('user/{id}/profile', function ($id) {
           //
        })->name('profile');

        $url = route('profile', ['id' => 1]);*/



    public function routing()
    {
        $this->parseUrl();
        //+обработать ошибку
        if($this->nameController!=='Controller')
        {
            $controller =$this->nameController;
            $action = $this->nameAction;
            if (method_exists($controller, $action))
            {
                $this->data = $controller::$action($this->params, $this->query);
                echo "<pre>";
                var_dump($this->data);
                echo "</pre>";
            }
            else
            {
                // кинуть исключение
                self::ErrorPage404();
            }
        }

    }

    private function parseUrl()
    {
        $arrayUrl=parse_url($_SERVER['REQUEST_URI']);

        //Parse path
        $path=explode('/',$arrayUrl['path']);
        array_shift($path);
        $this->nameController=ucfirst(array_shift($path)).$this->_needle;
        $this->nameAction= array_shift($path);
        $this->params= $path;
        $this->requestMethod=$_SERVER['REQUEST_METHOD'];

        //Parse query
        if(array_key_exists('query',$arrayUrl))
        {
            $query=explode(',',$arrayUrl['query']);
            $this->query=[];
            foreach ($query as $key=>$value)
            {
                $tmp=explode('=',$value);
                $this->query[$tmp[0]]=$tmp[1];
            }
        }
    }


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