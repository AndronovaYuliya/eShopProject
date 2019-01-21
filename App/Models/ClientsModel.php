<?php

namespace App\Models;

use App\Mappers\ClientsMapper;

/**
 * Class ClientsModel
 * @package App\Models
 */
class ClientsModel extends AbstractTableModel
{
    /**
     * @return void
     */
    public static function addFakerData(): void
    {
        ClientsMapper::addFakerData();
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        return ClientsMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ClientsMapper::getDataWhere($byWhat, $name);
    }
}