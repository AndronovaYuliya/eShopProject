<?php

namespace App\Models;

use Core\AbstractMapper;

/**
 * Class ProductsModel
 * @package AppModel\Models
 */
class ProductsModel extends AbstractMapper
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $brand;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    protected $old_price;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $count;

    /**
     * @var int
     */
    protected $id_category;

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
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param $brand
     * @return ProductsModel
     */
    public function setBrand($brand): ProductsModel
    {
        $this->brand = $brand;
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
     * @return ProductsModel
     */
    public function setAlias($alias): ProductsModel
    {
        $this->alias = $alias;
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
     * @return ProductsModel
     */
    public function setDescription($description): ProductsModel
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param $price
     * @return ProductsModel
     */
    public function setPrice($price): ProductsModel
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getOldPrice(): float
    {
        return $this->old_price;
    }

    /**
     * @param $oldPrice
     * @return ProductsModel
     */
    public function setOldPrice($oldPrice): ProductsModel
    {
        $this->old_price = $oldPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param $url
     * @return ProductsModel
     */
    public function setUrl($url): ProductsModel
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param $count
     * @return ProductsModel
     */
    public function setCount($count): ProductsModel
    {
        $this->count = $count;
        return $this;
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
     * @return ProductsModel
     */
    public function setIdCategory($id_category): ProductsModel
    {
        $this->id_category = $id_category;
        return $this;
    }

    /**
     * @param array $data
     * @return ProductsModel
     */
    public function fromState(array $data): ProductsModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->brand = $data['brand'];
        $this->alias = $data['alias'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->old_price = $data['old_price'];
        $this->url = $data['url'];
        $this->count = $data['count'];
        $this->id_category = $data['id_category'];

        return $this;
    }
}
