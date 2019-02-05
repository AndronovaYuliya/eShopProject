<?php

namespace App\Mappers;

use Core\Database;
use Core\Cache;

/**
 * Class ClientsMapper
 * @package App\Mappers
 */
class ClientsMapper extends AbstractTableMapper
{
    /**
     * @return array
     */
    public static function query(): array
    {
        /* $cache = new Cache();
         $data = $cache->get('clients');
         if (!$data) {*/
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
        /* $cache->set('clients', $data);
     }*/
        return $data;
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     * @throws \Exception
     */
    public static function getDataWhere(string $byWhat, string $name): array
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
              WHERE $byWhat=:name;";
        return Database::queryData($sql, [':name' => $name]);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     * @throws \Exception
     */
    public static function checkUnique(string $byWhat, string $name): array
    {
        $sql = "SELECT id FROM `clients` 
          WHERE $byWhat=:name";
        return Database::queryData($sql, [':name' => $name]);
    }

    /**
     * @param array $attributes
     * @throws \Exception
     */
    public static function addClient(array $attributes): void
    {
        $attributes['userPassword'] = password_hash($attributes['userPassword'], PASSWORD_DEFAULT);
        try {
            $sql = "INSERT INTO `clients` 
                    (name,login,password,email,phone,city, address,born, created_at, updated_at)
          VALUE (:userName,:userLogin,:userPassword,:userEmail, :userPhone,:userCity, 
                  :userAdress, :userBorn, NOW(), NOW())";
            Database::addData($sql, $attributes);
        } catch (PDOException $e) {
            throw new \Exception(["Clients table: {$e->getTraceAsString()}"], 500);
        }
    }
}