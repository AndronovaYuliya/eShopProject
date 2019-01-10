<?php

namespace Components\Models;

use Components\Mappers\ProductsMapper;

class ProductsModel extends AbstractTableModel
{
    private $_id;
    private $_title;
    private $_description;
    private $_price;
    private $_url;
    private $_sku;
    private $_id_category;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_title=isset($data['title'])?$data['title']:null;
            $this->_description=isset($data['description'])?$data['description']:null;
            $this->_price=isset($data['price'])?$data['price']:null;
            $this->_url=isset($data['url'])?$data['url']:null;
            $this->_sku=isset($data['sku'])?$data['sku']:null;
            $this->_id_category=isset($data['id_category'])?$data['id_category']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker(): void
    {
        ProductsMapper::addData();
    }

    public function getData(): array
    {
        $products=[];
        $data=ProductsMapper::getData();
        foreach ($data as $row){
            $products[]=new ProductsModel($row);
        }
        return $products;
    }

    public function getDataWhere(string $byWhat, string $name): array
    {
        $products=[];
        $data=ProductsMapper::getDataWhere($byWhat, $name);
        foreach ($data as $row){
            $products[]=new ProductsModel($row);
        }
        return $products;
    }
}