<?php

namespace App\Models;

use Core\AbstractModel;

/**
 * Class CategoriesAttributesModel
 * @package AppModel\Models
 */
class CategoriesAttributesModel extends AbstractModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $id_category;

    /**
     * @var string
     */
    protected $id_attribute;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    /**
     * @param $id_category
     * @return CategoriesAttributesModel
     */
    public function setIdCategory($id_category): CategoriesAttributesModel
    {
        $this->id_category = $id_category;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdAttribute(): int
    {
        return $this->id_attribute;
    }

    /**
     * @param $id_attribute
     * @return CategoriesAttributesModel
     */
    public function setIdAttribute($id_attribute): CategoriesAttributesModel
    {
        $this->id_attribute = $id_attribute;
        return $this;
    }

    /**
     * @param array $data
     * @return CategoriesAttributesModel
     */
    public function fromState(array $data): CategoriesAttributesModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->id_category = $data['id_category'];
        $this->id_attribute = $data['id_attribute'];

        return $this;
    }
}