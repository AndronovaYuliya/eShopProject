<?php

namespace Core;

use Core\Registry;
use Core\Database;

/**
 * Class App
 * @package Core
 */
class App
{
    public static $app;
    public static $db;
    public $faker;
    protected $route = [];
    protected $query;

    /**
     * App constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        self::$app = Registry::getInstance();
        self::$db = Database::getInstance();

        $this->getParams();
        Session::start();

        new MyException();
        // Get the current URL, differents depending on platform/server software
        if (!empty($_SERVER['REQUEST_URL'])) {
            $this->query = trim($_SERVER['REQUEST_URL'], '/');
        } else {
            $this->query = trim($_SERVER['REQUEST_URI'], '/');
        }
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