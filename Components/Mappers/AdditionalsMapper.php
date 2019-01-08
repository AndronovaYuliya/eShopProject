<?php

namespace Components\Mappers;

use Components\Core\FakerData;
use Components\Core\Database;
use Exception;

class AdditionalsMapper
{
    public static function addAdditionals(FakerData $faker)
    {
        $sql = "INSERT INTO `additionals` (id_product, id_order, count, price, created_at, updated_at) VALUE (:id_product, :id_order, :count, :price, NOW(), NOW())";
        try {
            for ($i=0;$i<10;$i++)
            {
                $data=$faker->fakerAdditionals();
                $stmt= Database::getConnection()->prepare($sql);
                $stmt->execute($data);
                $stmt->fetchAll();
            }
        }catch (Exception $exception){
            Database::getConnection()->rollback();
        }
    }
}