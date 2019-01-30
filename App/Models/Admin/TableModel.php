<?php

namespace App\Models\Admin;

use App\Mappers\Admin\TableMapper;
use Core\App;

/**
 * Class TableModel
 * @package App\Models\Admin
 */
class TableModel
{
    /**
     * @return array
     */
    public static function query(): array
    {
        return TableMapper::query();
    }

    /**
     * @return array
     */
    public static function getTables(): array
    {
        $data = TableMapper::getTables();
        $tables = [];
        foreach ($data as $key => $value) {
            $tables[] = $value['Tables_in_' . App::$app->getProperty('database')];
        }
        return $tables;
    }
}