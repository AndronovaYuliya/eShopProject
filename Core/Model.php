<?php

namespace Core;

use Core\Database;

/**
 * Class Model
 * @package Core
 */
class Model
{
    public $attributes=[];
    public $errors=[];
    public $rules=[];

    /**
     * Model constructor.
     */
    public function __construct()
    {
        Database::getInstance();
    }
}