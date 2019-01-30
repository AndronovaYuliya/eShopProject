<?php

namespace App\Mappers\Admin;

use Core\Cache;
use Core\Database;

/**
 * Class AdminMappers
 * @package App\Mappers\Admin
 */
class AdminMappers
{
    /**
     * @param array $attributes
     * @return void
     * @throws \Exception
     */
    public static function addUser(array $attributes): void
    {
        $sql = "INSERT INTO `users` (login, password, email,first_name, last_name,role, created_at, 
                  updated_at) VALUE (:login, :password,:email, 
                  :first_name, 
                  :last_name, :role, NOW(), NOW())";
        Database::addData($sql, $attributes);
    }

    /**
     * @param array $attributes
     * @param string $id
     * @return void
     * @throws \Exception
     */
    public static function updateAdmin(array $attributes, string $id): void
    {
        $data = [];
        $sql = "UPDATE users SET ";
        foreach ($attributes as $key => $value) {
            $sql .= " $key = :$key,";
            $data[":" . $key] = $value;
        }
        $sql .= " updated_at= NOW() WHERE id=:id;";
        $data[":id"] = $id;
        Database::addData($sql, $data);
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        $cache = new Cache();
        $data = $cache->get('users');
        if (!$data) {
            $sql = "SELECT id, login, email,first_name,last_name,role FROM `users`";
            $data = Database::query($sql);
            $cache->set('users', $data);
        }
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function checkUnique(string $byWhat, string $name): array
    {
        $sql = "SELECT id FROM `users` 
          WHERE $byWhat='$name'";
        return Database::query($sql);
    }

    /**
     * @param $email
     * @return array
     */
    public static function loadProfile($email): array
    {
        $sql = "SELECT id, login, email,first_name,last_name,role,password FROM `users` 
          WHERE email='$email'";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @throws \Exception
     */
    public static function deleteProfile(string $byWhat, string $name): void
    {
        $sql = "DELETE FROM users WHERE $byWhat=:name";
        Database::queryData($sql, [':name' => $name]);
    }

    /**
     * @param string $table
     * @param string $id
     * @throws \Exception
     */
    public static function deleteFromTable(string $table, string $id)
    {
        $sql = "DELETE FROM {$table} WHERE id=:id";
        Database::queryData($sql, [':id' => $id]);
    }

    /**
     * @param string $table
     * @param string $id
     * @return array
     * @throws \Exception
     */
    public static function checkDataTable(string $table, string $id)
    {
        $sql = "SELECT id from {$table} WHERE id=:id";
        return Database::queryData($sql, [':id' => $id]);
    }

    /**
     * @param string $table
     * @param array $data
     * @return array|string
     */
    public static function addTableData(string $table, array $data)
    {
        $attributes = [];
        $sql = "INSERT INTO {$table} (";
        foreach ($data as $key => $value) {
            $attributes[":{$key}"] = $value;
            $sql .= "{$key}, ";
        }
        $sql .= "updated_at) VALUES (";
        foreach ($data as $key => $value) {
            $sql .= ":{$key},";
        }
        $sql .= "NOW())";
        return Database::queryTableData($sql, $attributes);
    }

    /**
     * @param string $table
     * @param string $id
     * @param array $data
     * @return array|string
     */
    public static function editTableData(string $table, string $id, array $data)
    {
        $sql = "UPDATE users SET ";
        foreach ($data as $key => $value) {
            $sql .= " $key = :$key,";
            $attributes[":" . $key] = $value;
        }
        $sql .= " updated_at= NOW() WHERE id={$id};";
        return Database::queryTableData($sql, $attributes);
    }
}
