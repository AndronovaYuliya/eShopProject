<?php

namespace Components\Models;

use Components\Mappers\AttributesMapper;

class AttributesModel extends AbstractTableModel
{
    private $_id;
    private $_title;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_title=isset($data['title'])?$data['title']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker():void
    {
        AttributesMapper::addData();
    }

    public function getData():array
    {
        $attributes=[];
        $data=AttributesMapper::getData();
        foreach ($data as $row){
            $attributes[]=new AttributesModel($row);
        }
        return $attributes;
    }

    public function getDataWhere(string $byWhat, string $name):array
    {
        $attributes=[];
        $data=AttributesMapper::getDataWhere($byWhat, $name);
        foreach ($data as $row){
            $attributes[]=new AttributesModel($row);
        }
        return $attributes;
    }
}