<?php

namespace Core;

use App\Models\AdditionalsModel;
use App\Models\AttributesModel;
use App\Models\AttributesValuesModel;
use App\Models\CategoriesAttributesModel;
use App\Models\CategoriesModel;
use App\Models\ClientsModel;
use App\Models\CommentsModel;
use App\Models\ImagesModel;
use App\Models\KeyWordsModel;
use App\Models\OrdersModel;
use App\Models\ProductsImagesModel;
use App\Models\ProductsKeyWordsModel;
use App\Models\ProductsModel;
use App\Models\UsersModel;
use PDO;
use PDOException;
use CostumLogger\CostumLogger;
use Core\FakerData;

/**
 * Class Database
 * @package Core
 */
class Database
{
    use TSingletone;

    private static $_pdo;
    private static $_host;
    private static $_username;
    private static $_password;
    private static $_database;
    private static $_charset;
    private static $_dsn;
    private static $_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    /**
     * Database constructor.
     */
    private function __construct()
    {
        $config = App::$app->getProperies();

        self::$_host = $config['host'];
        self::$_username = $config['username'];
        self::$_password = $config['password'];
        self::$_database = $config['database'];
        self::$_charset = $config['charset'];
        self::$_dsn = "mysql:host=" . self::$_host . ";dbname=" . self::$_database . ";charset=" . self::$_charset;
        if (!self::$_pdo = new PDO(self::$_dsn, self::$_username, self::$_password, self::$_options)) {
            throw new \Exception("Тo connection to the database", 500);
        }

    }

    // Get mysqli connection

    /**
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        self::getInstance();
        return self::$_pdo;
    }

    /**
     * @throws \Exception
     */
    public static function createTables(): void
    {
        /*
         *
         * $dbh->query("create database ".self::$_database);
         * $dbh->query("use ".self::$_database);
         *
        */
        /*self::createTable('attributes');
        self::createTable('attributes_values');
        self::createTable('categories');
        self::createTable('categories_attributes');
        self::createTable('clients');
        self::createTable('images');
        self::createTable('orders');
        self::createTable('key_words');
        self::createTable('products');
        self::createTable('products_key_words');
        self::createTable('comments');
        self::createTable('additionals');
        self::createTable('products_images');
        self::createTable('users');
        self::createTable('sessions');
*/
            /*KeyWordsModel::addFakerData();
             AttributesModel::addFakerData();
             ClientsModel::addFakerData();
             AttributesValuesModel::addFakerData();
             CategoriesModel::addFakerData();
             CategoriesAttributesModel::addFakerData();
             ImagesModel::addFakerData();
             ProductsModel::addFakerData();
             OrdersModel::addFakerData();
             CommentsModel::addFakerData();
             ProductsImagesModel::addFakerData();
             AdditionalsModel::addFakerData();
             ProductsKeyWordsModel::addFakerData();
             UsersModel::addFakerData();*/

    }

    /**
     * @param $filename
     * @throws \Exception
     */
    private static function createTable($filename): void
    {
        $sql = file_get_contents(DB . '/' . $filename . '.sql');
        try {
            Database::getConnection()->exec($sql);
        } catch (PDOException $e) {
            throw new \Exception(["Creating table {$filename}: {$e->getTraceAsString()}"], 500);
        }

    }

    /**
     * @param $fakerMethod
     * @param string $sql
     * @param int $count
     * @throws \Exception
     */
    public static function addFakerData($fakerMethod, string $sql, int $count = 1): void
    {
        $faker = new FakerData();
        for ($i = 0; $i < $count; $i++) {
            $data = $faker->$fakerMethod();
            $stmt = Database::getConnection()->prepare($sql);
            if ($stmt !== false) {
                $stmt->execute($data);
                $stmt->fetchAll();
            } else {
                throw new \Exception("Sql wrong: {$sql}", 100);
            }
        }
    }

    /**
     * @param string $sql
     * @param array $data
     * @throws \Exception
     */
    public static function addData(string $sql, array $data): void
    {
        $stmt = self::getConnection()->prepare($sql);
        if ($stmt !== false) {
            $stmt->execute($data);
            $stmt->fetchAll();
        } else {
            throw new \Exception("Sql wrong: {$sql}", 100);
        }
    }

    /**
     * @param string $sql
     * @return array
     */
    public static function query(string $sql): array
    {
        return self::getConnection()->query($sql)->fetchAll();
    }

    /**
     * @param string $sql
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public static function queryData(string $sql, array $data): array
    {
        $stmt = self::getConnection()->prepare($sql);
        if ($stmt !== false) {
            $stmt->execute($data);
            return $stmt->fetchAll();
        } else {
            throw new \Exception("Sql wrong: {$sql}", 100);
        }
    }
}