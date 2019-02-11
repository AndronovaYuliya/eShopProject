<?php

namespace App\Models;

use App\Mappers\UsersMapper;
use App\Validators\ClientsValidator;
use Core\Validator;

/**
 * Class UsersModel
 * @package App\Models
 */
class UsersModel extends AbstractTableModel
{
    protected static $errors;

    /**
     * @return array
     */
    public static function query(): array
    {
        return UsersMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     * @throws \Exception
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return UsersMapper::getDataWhere($byWhat, $name);
    }


}