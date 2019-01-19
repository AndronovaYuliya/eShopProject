<?php

namespace App\Mappers;

use Core\Database;

class UsersMapper extends AbstractTableMapper
{
    public static function addData(): void
    {
        $sql = "INSERT INTO `users` (login,password,email,first_name,last_name,role,created_at, updated_at) VALUE 
            (:login, :password,:email, :first_name,:last_name,:role,NOW(), NOW())";
        Database::addData('fakerUsers',$sql,1);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, login,password,email,first_name,last_name,role,created_at, updated_at FROM `users`;";
        return Database::getData($sql);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, login,password,email,first_name,last_name,role,created_at, updated_at 
        FROM `users` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }
}