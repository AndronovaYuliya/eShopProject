<?php

namespace App\Mappers;

use Core\AbstractMapper;
use Core\TSingletone;

/**
 * Class OrdersMapper
 * @package AppModel\Mappers
 */
class OrdersMapper extends AbstractMapper
{
    use TSingletone;

    protected const SELECT = "SELECT * FROM orders ";
    protected const INSERT = "INSERT INTO orders ( sum, id_client,created_at, updated_at)
                              VALUE (:sum,:id_client, NOW(), NOW())";


}
