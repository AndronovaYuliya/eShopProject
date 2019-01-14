<?php

namespace Components\Models;

use Components\Mappers\ClientsMapper;

class ClientsModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        ClientsMapper::addData();
    }

    public static function getData(): array
    {
        return ClientsMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ClientsMapper::getDataWhere($byWhat, $name);
    }
}