<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class ClientsMapper
 * @package AppModel\Mappers
 */
class ClientsMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM clients ";
    protected const INSERT = "INSERT INTO clients 
            (name,phone,login,email,city,address,born,password, created_at, updated_at)
            VALUE (:userName, :userPhone,:userLogin,:userEmail,:userCity,:userAdress,
            :userBorn,:userPassword, NOW(), NOW())";

}
