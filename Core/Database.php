<?php

namespace Core;

use App\Models\AppModel;
use PDO;
use PDOException;
use CostumLogger\CostumLogger;
use Core\Registry;

/**
 * Class Database
 * @package Core
 */
class Database
{
    use TSingletone;

    private static $pdo;
    private static $host;
    private static $username;
    private static $password;
    private static $database;
    private static $charset;
    private static $dsn;
    private static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    /**
     * Database constructor.
     */
    private function __construct()
    {
        $config = AppModel::$app->getProperies();

        self::$host = $config['host'];
        self::$username = $config['username'];
        self::$password = $config['password'];
        self::$database = $config['database'];
        self::$charset = $config['charset'];
        self::$dsn = "mysql:host=" . self::$host . ";dbname=" . self::$database . ";charset=" . self::$charset;
        if (!self::$pdo = new PDO(self::$dsn, self::$username, self::$password, self::$options)) {
            throw new \Exception("Тo connection to the database", 500);
        }
    }

    /**
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        self::getInstance();
        return self::$pdo;
    }

    /**
     * @throws \Exception
     */
    public static function createTables(): void
    {
        self::createTable('andronova_db');
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
    public static function queryData($sql, $data): array
    {
        $stmt = self::getConnection()->prepare($sql);
        if ($stmt !== false) {
            $stmt->execute($data);
            return $stmt->fetchAll();
        } else {
            throw new \Exception("Sql wrong: {$sql}", 100);
        }
    }

    /**
     * @param string $sql
     * @param array $data
     * @return bool|string
     */
    public static function queryTableData(string $sql, array $data)
    {
        try {
            $stmt = self::getConnection()->prepare($sql);
            $stmt->execute($data);
            $stmt->fetchAll();
            return true;
        } catch (PDOException $ex) {
            return "Incorrect data";
        }
    }

    /**
     * @param string $sql
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function findOne(string $sql, array $data)
    {
        try {
            $stmt = self::getConnection()->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetch();
        } catch (PDOException $ex) {
            throw new \Exception("Sql wrong: {$sql},{$ex->getTraceAsString()}", 500);
        }
    }

    /**
     * @param string $sql
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function findAll(string $sql, array $data): array
    {
        try {
            $stmt = self::getConnection()->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            throw new \Exception("Sql wrong: {$sql},{$ex->getTraceAsString()}", 500);
        }
    }
}
