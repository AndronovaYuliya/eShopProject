<?php

namespace App\Mappers\Admin;

use App\Mappers\AbstractTableMapper;

class TableMapper extends AbstractTableMapper
{

    /**
     * @return void
     */
    protected static function addData(): void
    {
        // TODO: Implement addData() method.
    }

    /**
     * @return void
     */
    protected static function addFakerData(): void
    {
        // TODO: Implement addFakerData() method.
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        $sql = "SELECT 
                        id
                        ,login
                        ,password
                        ,email
                        ,first_name
                        ,last_name
                        ,role
                        ,created_at
                        ,updated_at
                FROM `users`;";
        return Database::query($sql);
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return mixed
     */
    protected static function getDataWhere(string $byWhat, string $name)
    {
        // TODO: Implement getDataWhere() method.
    }
}