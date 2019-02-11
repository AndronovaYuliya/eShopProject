<?php

namespace Core;

use PDO;
use PDOException;
use CostumLogger\CostumLogger;

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
}