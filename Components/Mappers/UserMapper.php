<?php

namespace Components\Mappers;

use Components\Core\Database;

class UserMapper extends AbstractTableMapper
{
    public static function addData(): void
    {
        $sql = "INSERT INTO `user` (login,password,email,first_name,last_name,role,created_at, updated_at) VALUE 
            (:login, :password,:email, :first_name,:last_name,:role,NOW(), NOW())";
        Database::addData('fakerUser',$sql,1);
    }

    public static function getData(): array
    {
        $sql = "SELECT id, login,password,email,first_name,last_name,role,created_at, updated_at FROM `user`;";
        return Database::getData($sql);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, login,password,email,first_name,last_name,role,created_at, updated_at 
        FROM `user` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }
}