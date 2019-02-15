<?php

namespace App\Models;

use Core\AbstractModel;
use Core\TSingletone;

/**
 * Class AttributesModel
 * @package AppModel\Models
 */
class AttributesModel extends AbstractModel
{
    use TSingletone;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param $title
     * @return AttributesModel
     */
    public function setIdProduct($title): AttributesModel
    {
        $this->title = $title;
        return $this;
    }
}
