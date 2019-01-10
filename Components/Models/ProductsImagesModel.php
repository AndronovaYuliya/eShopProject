<?php

namespace Components\Models;

use Components\Mappers\ProductsImagesMapper;

class ProductsImagesModel extends AbstractTableModel
{
    private $_id;
    private $_id_galary;
    private $_id_product;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_id_galary=isset($data['id_galary'])?$data['id_galary']:null;
            $this->_id_product=isset($data['id_product'])?$data['id_product']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker(): void
    {
        ProductsImagesMapper::addData();
    }

    public function getData(): array
    {
        $productsImages=[];
        $data=ProductsImagesMapper::getData();
        foreach ($data as $row){
            $productsImages[]=new ProductsImagesModel($row);
        }
        return $productsImages;
    }

    public function getDataWhere(string $byWhat, string $name): array
    {
        $productsImages=[];
        $data=ProductsImagesMapper::getDataWhere($byWhat, $name);
        foreach ($data as $row){
            $productsImages[]=new ProductsImagesModel($row);
        }
        return $productsImages;
    }
}