<?php

namespace App\Models;

use App\Mappers\CategoriesMapper;
use Core\AbstractModel;

/**
 * Class CategoriesModel
 * @package AppModel\Models
 */
class CategoriesModel extends AbstractModel
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
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @var int
     */
    protected $parent_id;

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
     * @return CategoriesModel
     */
    public function setTitle($title): CategoriesModel
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return CategoriesModel
     */
    public function setDescription($description): CategoriesModel
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param $alias
     * @return CategoriesModel
     */
    public function setAlias($alias): CategoriesModel
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentId(): string
    {
        return $this->parent_id;
    }

    /**
     * @param $parent_id
     * @return CategoriesModel
     */
    public function setParentId($parent_id): CategoriesModel
    {
        $this->parent_id = $parent_id;
        return $this;
    }

    /**
     * @param array $data
     * @return CategoriesModel
     */
    public function fromState(array $data): CategoriesModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->alias = $data['alias'];
        $this->parent_id = $data['parent_id'];

        return $this;
    }
}