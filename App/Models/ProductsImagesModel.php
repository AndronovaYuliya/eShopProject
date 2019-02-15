<?php

namespace App\Models;

use Core\AbstractModel;
use Core\TSingletone;

/**
 * Class ProductsImagesModel
 * @package AppModel\Models
 */
class ProductsImagesModel extends AbstractModel
{
    use TSingletone;

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
}
