<?php

namespace App\Models;

use Core\AbstractModel;
use Core\TSingletone;

/**
 * Class AdditionalsModel
 * @package AppModel\Models
 */
class AdditionalsModel extends AbstractModel
{
    use TSingletone;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $id_product;

    /**
     * @var int
     */
    protected $id_order;

    /**
     * @var int
     */
    protected $count;

    /**
     * @var float
     */
    protected $price;

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
    public function getIdProduct(): int
    {
        return $this->id_product;
    }

    /**
     * @param $id_product
     * @return AdditionalsModel
     */
    public function setIdProduct($id_product): AdditionalsModel
    {
        $this->id_product = $id_product;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdOrder(): int
    {
        return $this->id_order;
    }

    /**
     * @param $id_order
     * @return AdditionalsModel
     */
    public function setIdOrder($id_order): AdditionalsModel
    {
        $this->id_order = $id_order;
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
     * @return AdditionalsModel
     */
    public function setCount($count): AdditionalsModel
    {
        $this->count = $count;
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
     * @return AdditionalsModel
     */
    public function setPrice($price): AdditionalsModel
    {
        $this->price = $price;
        return $this;
    }
}
