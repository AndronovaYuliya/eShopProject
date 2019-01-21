<?php

namespace App\Models;

use App\Mappers\UsersMapper;

/**
 * Class UsersModel
 * @package App\Models
 */
class UsersModel extends AbstractTableModel
{
    /**
     * @return void
     */
    static public function addFakerData(): void
    {
        UsersMapper::addFakerData();
    }

    /**
     * @return array
     */
    static public function query(): array
    {
        return UsersMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     */
    static public function getDataWhere(string $byWhat, string $name): array
    {
        return UsersMapper::getDataWhere($byWhat, $name);
    }
}