<?php

namespace App\Models;

use App\Mappers\UserMapper;

class UserModel extends AbstractTableModel
{

    static public function addFaker(): void
    {
        UserMapper::addData();
    }

    static public function getData(): array
    {
        return UserMapper::getData();
    }

    static public function getDataWhere(string $byWhat, string $name): array
    {
        return UserMapper::getDataWhere($byWhat,$name);
    }
}