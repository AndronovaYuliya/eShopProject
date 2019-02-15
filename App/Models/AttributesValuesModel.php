<?php

namespace App\Models;

use Core\AbstractModel;
use Core\TSingletone;

/**
 * Class AttributesValuesModel
 * @package AppModel\Models
 */
class AttributesValuesModel extends AbstractModel
{
    use TSingletone;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var int
     */
    protected $attributes_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param $value
     * @return AttributesValuesModel
     */
    public function setValue($value): AttributesValuesModel
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getAttributesId(): int
    {
        return $this->attributes_id;
    }

    /**
     * @param $attributes_id
     * @return AttributesValuesModel
     */
    public function setAttributesId($attributes_id): AttributesValuesModel
    {
        $this->attributes_id = $attributes_id;
        return $this;
    }
}
