<?php

namespace App\Mappers;

use Core\Database;

/**
 * Class UsersMapper
 * @package App\Mappers
 */
class UsersMapper extends AbstractTableMapper
{
    /**
     * @return void
     */
    public static function addFakerData(): void
    {
        $sql = "INSERT INTO `users` (login,password,email,first_name,last_name,role,created_at, updated_at) VALUE 
            (:login, :password,:email, :first_name,:last_name,:role,NOW(), NOW())";
        Database::addFakerData('fakerUsers', $sql, 1);
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        $sql = "SELECT id, login,password,email,first_name,last_name,role,created_at, updated_at FROM `users`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, login,password,email,first_name,last_name,role,created_at, updated_at 
        FROM `users` WHERE $byWhat=$name;";
        return Database::query($sql);
    }

    /**
     * @return void
     */
    protected static function addData(): void
    {
        // TODO: Implement addFakerData() method.
    }
}