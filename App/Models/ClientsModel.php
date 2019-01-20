<?php

namespace App\Models;

use App\Mappers\ClientsMapper;

class ClientsModel extends AbstractTableModel
{
    public static function addFakerData(): void
    {
        ClientsMapper::addFakerData();
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