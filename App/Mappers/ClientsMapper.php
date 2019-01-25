<?php

namespace App\Mappers;

use Core\Database;
use Core\Cache;

/**
 * Class ClientsMapper
 * @package App\Mappers
 */
class ClientsMapper
{
    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        try {
            $sql = "INSERT INTO `clients` (name, login, email, phone,city,address,born,password,created_at,updated_at) 
                                    VALUE (:name, :login, :email, :phone, :city, :address, NOW(),:password,NOW(),NOW())";
            Database::addFakerData('fakerClients', $sql, 10);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table clients: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        //$cache = new Cache();
        // $data = $cache->get('clients');
        // if (!$data) {
        $sql = "SELECT 
                        id
                        ,name
                        ,login
                        ,email
                        ,phone
                        ,city
                        ,address
                        ,born
                        ,password
                        ,created_at
                        ,updated_at
                FROM `clients`;";
        $data = Database::query($sql);
        //     $cache->set('clients', $data);
        // }
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array|mixed
     */
    public static function getDataWhere(string $byWhat, string $name)
    {
        $sql = "SELECT 
                        id
                        ,name
                        ,login
                        ,email
                        ,phone
                        ,city
                        ,address
                        ,born
                        ,password
                        ,created_at
                        ,updated_at 
              FROM `clients` 
              WHERE $byWhat=$name;";
        return Database::query($sql);
    }

    /**
     * @return void
     */
    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }
}