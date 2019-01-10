<?php

namespace Components\Mappers;

use Components\Core\Database;

class ClientsMapper extends AbstractTableMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'clients'";

    public static function addData(): void
    {
        $sql = "INSERT INTO `clients` (name, login, email, phone,city,address,born,password,created_at,updated_at) VALUE (:name, :login, :email, :phone, :city, :address, NOW(),:password,NOW(),NOW())";
        Database::addData('fakerClients', $sql, 10);
    }

    public static function getData():array
    {
        $sql = "SELECT id, name,login,email,phone,city,address,born,password, created_at, updated_at FROM `clients`;";
        return Database::getData($sql, self::$_checkTable);
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, name,login,email,phone,city,address,born,password, created_at, updated_at FROM `clients` WHERE $byWhat=$name;";
        return Database::getData($sql, self::$_checkTable);
    }
}