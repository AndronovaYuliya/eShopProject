<?php

namespace App\Models\Admin;

use App\Mappers\Admin\TableMapper;

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
}