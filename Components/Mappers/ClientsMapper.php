<?php

namespace Components\Mappers;

use Components\Core\FakerData;
use Components\Core\Database;
use Exception;

class ClientsMapper
{
    public static function addClients(FakerData $faker)
    {
        $sql = "INSERT INTO `clients` (name, login, email, phone,city,address,born,password,created_at,updated_at) VALUE (:name, :login, :email, :phone, :city, :address, NOW(),:password,NOW(),NOW())";
        try {
            for ($i=0;$i<10;$i++)
            {
                $data=$faker->fakerClients();
                $stmt= Database::getConnection()->prepare($sql);
                $stmt->execute($data);
                $stmt->fetchAll();
            }
        }catch (Exception $exception){
            Database::getConnection()->rollback();
        }
    }

}