<?php

namespace Core;

use App\Models\FakerModel;

class App
{
    public static $app;
    public $faker;

    /**
     * App constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        self::$app = Registry::getInstance();
        $this->getParams();
        Session::start();

        new MyException();
        // Get the current URL, differents depending on platform/server software
        if (!empty($_SERVER['REQUEST_URL'])) {
            $query = trim($_SERVER['REQUEST_URL'], '/');
        } else {
            $query = trim($_SERVER['REQUEST_URI'], '/');
        }
        Router::dispatch($query);
    }

    /**
     * @return void
     */
    protected function getParams(): void
    {
        $params = parse_ini_file(CONF . '/config.ini');
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
    }
}