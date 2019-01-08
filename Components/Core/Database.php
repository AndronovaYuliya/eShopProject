<?php

namespace Components\Core;

use Monolog\Processor\TagProcessor;
use PDO;
use Components\Core\FakerData;
use PDOException;
use CostumLogger\CostumLogger;


class Database
{
    private static $_pdo;
    private static $_instance; //The single instance
    private static $_host;
    private static $_username;
    private static $_password;
    private static $_database;
    private static $_charset;
    private static $_dsn;
    private static $_options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];


    public static function getInstance():Database
    {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $config= parse_ini_file(dirname(__FILE__,3).'/config/config.ini');

        self::$_host=$config['host'];
        self::$_username=$config['username'];
        self::$_password=$config['password'];
        self::$_database=$config['database'];
        self::$_charset=$config['charset'];
        self::$_dsn = "mysql:host=".self::$_host.";dbname=".self::$_database.";charset=".self::$_charset;

        try {
            self::$_pdo= new PDO(self::$_dsn, self::$_username, self::$_password, self::$_options);
        } catch (PDOException $exception) {
            die('Подключение не удалось: ' . $exception->getMessage());
        }

    }

    // Get mysqli connection
    public static function getConnection():PDO
    {
        return self::$_pdo;
    }

    public static function createTables():void
    {
        self::createTable('attributes');
        self::createTable('attributes_values');
        self::createTable('categories');
        self::createTable('categories_attributes');
        self::createTable('clients');
        self::createTable('images');
        self::createTable('key_words');
        self::createTable('orders');
        self::createTable('products');
        self::createTable('comments');
        self::createTable('additionals');
        self::createTable('products_images');
        self::createTable('products_key_words');
    }

    private static function createTable($filename):void
    {
        $sql = file_get_contents(dirname(__FILE__,3).'/database/'.$filename.'.sql');
        self::$_pdo->exec($sql);
    }

    public static function addData($fakerMethod, string $sql, int $count=1):void
    {
        $faker = new FakerData();
        for ($i=0;$i<$count;$i++) {
            $data=$faker->$fakerMethod();
            $stmt= self::$_pdo->prepare($sql);
            $stmt->execute($data);
            $stmt->fetchAll();
        }
    }

    public static function getData(string $sql, string $checkTable):array
    {
        $data=[];

        $stmt=self::$_pdo->query($checkTable);

        //if table Exists
        if($stmt->fetch()){
            try{
                $data = self::$_pdo->query($sql)->fetchAll();
            }catch (PDOException $PDOException){
                $costumLog=new CostumLogger('database');
                $costumLog->critical($PDOException->getTraceAsString());
            }
        };
        return $data;
    }
}