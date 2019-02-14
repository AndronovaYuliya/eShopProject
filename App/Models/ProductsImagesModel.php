<?php

namespace App\Models;

use Core\AbstractModel;

/**
 * Class ProductsImagesModel
 * @package App\Models
 */
class ProductsImagesModel extends AbstractModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $id_galary;

    /**
     * @var int
     */
    protected $id_product;

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
    public function getIdGalary(): int
    {
        return $this->id_galary;
    }

    /**
     * @param $idGalary
     * @return ProductsImagesModel
     */
    public function setIdGalary($idGalary): ProductsImagesModel
    {
        $this->id_galary = $idGalary;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdProduct(): int
    {
        return $this->id_product;
    }

    /**
     * @param $idProduct
     * @return ProductsImagesModel
     */
    public function setProduct($idProduct): ProductsImagesModel
    {
        $this->id_product = $idProduct;
        return $this;
    }

    /**
     * @param array $data
     * @return ProductsImagesModel
     */
    public function fromState(array $data): ProductsImagesModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->id_galary = $data['id_galary'];
        $this->id_product = $data['id_product'];

        return $this;
    }
}