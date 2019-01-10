<?php

namespace Components\Models;

use Components\Mappers\ImagesMapper;

class ImagesModel extends AbstractTableModel
{
    private $_id;
    private $_file_name;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_file_name=isset($data['file_name'])?$data['file_name']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker(): void
    {
        ImagesMapper::addData();
    }

    public function getData(): array
    {
        $images=[];
        $data=ImagesMapper::getData();
        foreach ($data as $row){
            $images[]=new ImagesModel($row);
        }
        return $images;
    }

    public function getDataWhere(string $byWhat, string $name): array
    {
        $images=[];
        $data=ImagesMapper::getDataWhere($byWhat, $name);
        foreach ($data as $row){
            $images[]=new ImagesModel($row);
        }
        return $images;
    }
}