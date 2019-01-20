<?php

namespace App\Mappers;

use Core\Database;
use Core\Cache;

class ClientsMapper extends AbstractTableMapper
{
    public static function addFakerData(): void
    {
        $sql = "INSERT INTO `clients` (name, login, email, phone,city,address,born,password,created_at,updated_at) VALUE (:name, :login, :email, :phone, :city, :address, NOW(),:password,NOW(),NOW())";
        Database::addFakerData('fakerClients', $sql, 10);
    }

    public static function getData(): array
    {
        $cache = new Cache();
        $data = $cache->get('clients');
        if (!$data) {
            $sql = "SELECT id, name,login,email,phone,city,address,born,password, created_at, updated_at FROM `clients`;";
            $data = Database::getData($sql);
            $cache->set('clients', $data);
        }
        return $data;
    }

    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT id, name,login,email,phone,city,address,born,password, created_at, updated_at FROM `clients` WHERE $byWhat=$name;";
        return Database::getData($sql);
    }

    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}