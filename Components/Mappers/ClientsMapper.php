<?php

namespace Components\Mappers;

use Components\Core\Database;

class ClientsMapper
{
    private static $_checkTable="SHOW TABLES LIKE 'clients'";

    public static function addClients():void
    {
        $sql = "INSERT INTO `clients` (name, login, email, phone,city,address,born,password,created_at,updated_at) VALUE (:name, :login, :email, :phone, :city, :address, NOW(),:password,NOW(),NOW())";
        Database::addData('fakerClients', $sql, 10);
    }

    public static function getClients():array
    {
        $sql = "SELECT id, name,login,email,phone,city,address,born,password, created_at, updated_at FROM `clients`;";
        $data=Database::getData($sql, self::$_checkTable);
        return $data;
    }

}