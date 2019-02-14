<?php

namespace App\Mappers;

use Core\AbstractMapper;

/**
 * Class AttributesValuesMapper
 * @package App\Mappers
 */
class AttributesValuesMapper extends AbstractMapper
{
    protected const SELECT = "SELECT * FROM attributes_values";
}