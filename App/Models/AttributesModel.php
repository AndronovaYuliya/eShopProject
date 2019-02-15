<?php

namespace App\Models;

use Core\AbstractModel;

/**
 * Class AttributesModel
 * @package AppModel\Models
 */
class AttributesModel extends AbstractModel
{
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

    /**
     * @param array $data
     * @return AttributesModel
     */
    public function fromState(array $data): AttributesModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->title = $data['title'];

        return $this;
    }
}