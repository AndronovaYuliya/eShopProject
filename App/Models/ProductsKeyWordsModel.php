<?php

namespace App\Models;

use Core\AbstractModel;

/**
 * Class ProductsKeyWordsModel
 * @package App\Models
 */
class ProductsKeyWordsModel extends AbstractModel
{
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

    /**
     * @param array $data
     * @return ProductsImagesModel
     */
    public function fromState(array $data): ProductsKeyWordsModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->id_product = $data['id_product'];
        $this->id_key_word = $data['id_key_word'];

        return $this;
    }
}