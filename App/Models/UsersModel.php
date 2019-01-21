<?php

namespace App\Models;

use App\Mappers\UsersMapper;

class UsersModel extends AbstractTableModel
{

    static public function addFakerData(): void
    {
        UsersMapper::addFakerData();
    }

    static public function query(): array
    {
        return UsersMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    static public function getDataWhere(string $byWhat, string $name): array
    {
        return UsersMapper::getDataWhere($byWhat, $name);
    }
}