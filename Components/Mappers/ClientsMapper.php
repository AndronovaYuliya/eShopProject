<?php

namespace Components\Mappers;

use Components\Core\Database;

class ClientsMapper
{
    public static function addClients():void
    {
        $sql = "INSERT INTO `clients` (name, login, email, phone,city,address,born,password,created_at,updated_at) VALUE (:name, :login, :email, :phone, :city, :address, NOW(),:password,NOW(),NOW())";
        Database::addData('fakerClients', $sql, 10);
    }

}