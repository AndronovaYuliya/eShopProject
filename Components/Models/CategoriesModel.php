<?php

namespace Components\Models;

use Components\Mappers\CategoriesMapper;

class CategoriesModel extends AbstractTableModel
{
    private $_id;
    private $_title;
    private $_description;
    private $_icon;
    private $_parent_id;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_title=isset($data['title'])?$data['title']:null;
            $this->_description=isset($data['description'])?$data['description']:null;
            $this->_icon=isset($data['icon'])?$data['icon']:null;
            $this->_parent_id=isset($data['parent_id'])?$data['parent_id']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker(): void
    {
        CategoriesMapper::addData();
    }

    public static function getData(): array
    {
        return CategoriesMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return CategoriesMapper::getDataWhere($byWhat, $name);
    }

    protected function toObject($data):array
    {
        $products=[];
        foreach ($data as $row){
            $products[]=new CategoriesModel($row);
        }
        return $products;
    }


}