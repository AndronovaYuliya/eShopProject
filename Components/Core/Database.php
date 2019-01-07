<?php

namespace Components\Core;

use Monolog\Processor\TagProcessor;
use PDO;

class Database
{
    private $_pdo;
    private static $_instance; //The single instance
    private $_host;
    private $_username;
    private $_password;
    private $_database;
    private $_charset;
    private $_dsn;
    private $_options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];


    public static function getInstance()
    {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $config= parse_ini_file(dirname(__FILE__,3).'/config/config.ini');

        $this->_host=$config['host'];
        $this->_username=$config['username'];
        $this->_password=$config['password'];
        $this->_database=$config['database'];
        $this->_charset=$config['charset'];
        $this->_dsn = "mysql:host=$this->_host;dbname=$this->_database;charset=$this->_charset";

        try {
            $this->_pdo= new PDO($this->_dsn, $this->_username, $this->_password, $this->_options);
        } catch (PDOException $exception) {
            die('Подключение не удалось: ' . $exception->getMessage());
        }

    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }

    // Get mysqli connection
    public function getConnection()
    {
        return $this->_pdo;
    }

    public function createTables()
    {
        $this->createTable('attributes');
        $this->createTable('attributes_values');
        $this->createTable('categories');
        $this->createTable('categories_attributes');
        $this->createTable('clients');
        $this->createTable('images');
        $this->createTable('key_words');
        $this->createTable('orders');
        $this->createTable('products');
        $this->createTable('comments');
        $this->createTable('additionals');
        $this->createTable('products_images');
        $this->createTable('products_key_words');
    }

    private function createTable($filename)
    {
        $sql = file_get_contents(dirname(__FILE__,3).'/database/'.$filename.'.sql');
        $this->_pdo->exec($sql);
    }
}