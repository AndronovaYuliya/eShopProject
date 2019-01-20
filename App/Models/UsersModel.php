<?php

namespace App\Models;

use App\Mappers\UsersMapper;

class UsersModel extends AbstractTableModel
{

    static public function addFakerData(): void
    {
        UsersMapper::addFakerData();
    }

    static public function getData(): array
    {
        return UsersMapper::getData();
    }

    static public function getDataWhere(string $byWhat, string $name): array
    {
        return UsersMapper::getDataWhere($byWhat, $name);
    }
}