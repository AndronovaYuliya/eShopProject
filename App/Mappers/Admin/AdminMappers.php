<?php

namespace App\Mappers\Admin;

use Core\Cache;
use Core\Database;

class AdminMappers
{
    /**
     * @param array $attributes
     */
    public static function addUser(array $attributes)
    {
        $sql = "INSERT INTO `users` (login, password, email,first_name, last_name,role, created_at, 
                  updated_at) VALUE (:adminLogin, :adminPassword,:adminEmail, :adminFirstName, 
                  :adminLastName, :adminRole, NOW(), NOW())";
        Database::addData($sql, $attributes);
    }

    /**
     * @param array $attributes
     * @param string $id
     */
    public static function updateUser(array $attributes,string $id)
    {
        $sql = "UPDATE `users` SET password=:adminPassword, first_name=:adminFirstName,
                  last_name=:adminLastName,role=:adminRole, updated_at= NOW() WHERE id=$id";
        Database::addData($sql, $attributes);
    }

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
     */
    public static function checkUnique(string $byWhat, string $name): array
    {
        $sql = "SELECT id FROM `users` 
          WHERE $byWhat='$name'";
        return Database::query($sql);
    }

    /**
     * @param string $email
     */
    public static function loadProfile($email): array
    {
        $sql = "SELECT id, login, email,first_name,last_name,role,password FROM `users` 
          WHERE email='$email'";
        return Database::query($sql);
    }
}
