<?php

namespace Components\Models;

use Components\Mappers\ClientsMapper;

class ClientsModel
{
    public static function addClients():void
    {
        ClientsMapper::addClients();
    }

    public static function getClients():array
    {
        return ClientsMapper::getClients();
    }
}