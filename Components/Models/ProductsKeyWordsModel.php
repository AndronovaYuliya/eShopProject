<?php

namespace Components\Models;

use Components\Mappers\ProductsKeyWordsMapper;

class ProductsKeyWordsModel extends AbstractTableModel
{
    private $_id;
    private $_id_product;
    private $_id_key_word;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_id_product=isset($data['id_product'])?$data['id_product']:null;
            $this->_id_key_word=isset($data['id_key_word'])?$data['id_key_word']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker(): void
    {
        ProductsKeyWordsMapper::addData();
    }

    public function getData(): array
    {
        $data=ProductsKeyWordsMapper::getData();
        return $this->toObject($data);
    }

    public function getDataWhere(string $byWhat, string $name): array
    {
        $data=ProductsKeyWordsMapper::getDataWhere($byWhat, $name);
        return $this->toObject($data);
    }

    public function toObject($data): array
    {
        $products=[];
        foreach ($data as $row){
            $products[]=new ProductsKeyWordsModel($row);
        }
        return $products;
    }
}