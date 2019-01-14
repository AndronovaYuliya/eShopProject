<?php

namespace Components\Models;

use Components\Mappers\AttributesValuesMapper;

class AttributesValuesModel extends AbstractTableModel
{
    private $_id;
    private $_value;
    private $_created_at;
    private $_updated_at;
    private $_attributes_id;

    public function __construct(array $data=[])
    {
        if(empty(!$data)) {
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_value=isset($data['value'])?$data['value']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
            $this->_attributes_id=isset($data['attributes_id'])?$data['attributes_id']:null;
        }
    }

    public function addFaker():void
    {
        AttributesValuesMapper::addData();
    }

    public static function getData(): array
    {
        return AttributesValuesMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return AttributesValuesMapper::getDataWhere($byWhat, $name);
    }

    protected function toObject($data):array
    {
        $products=[];
        foreach ($data as $row){
            $products[]=new AttributesValuesModel($row);
        }
        return $products;
    }
}