<?php

namespace App\Models;

use Core\AbstractModel;
use Core\TSingletone;

/**
 * Class ProductsKeyWordsModel
 * @package AppModel\Models
 */
class ProductsKeyWordsModel extends AbstractModel
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
    protected $id_key_word;

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
     * @param $idProduct
     * @return ProductsKeyWordsModel
     */
    public function setIdProduct($idProduct): ProductsKeyWordsModel
    {
        $this->id_product = $idProduct;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdKeyWord(): int
    {
        return $this->id_key_word;
    }

    /**
     * @param $idKeyWord
     * @return ProductsKeyWordsModel
     */
    public function setIdKeyWord($idKeyWord): ProductsKeyWordsModel
    {
        $this->id_key_word = $idKeyWord;
        return $this;
    }
}
