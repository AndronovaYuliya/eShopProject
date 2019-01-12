<?php
namespace Components\Models;

use Components\Mappers\KeyWordsMapper;

class KeyWordsModel extends AbstractTableModel
{
    private $_id;
    private $_name;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_name=isset($data['name'])?$data['name']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker(): void
    {
        KeyWordsMapper::addData();
    }

    public function getData(): array
    {
        $data=KeyWordsMapper::getData();
        return $this->toObject($data);
    }

    public function getDataWhere(string $byWhat, string $name): array
    {
        $data=KeyWordsMapper::getDataWhere($byWhat, $name);
        return $this->toObject($data);
    }

    protected function toObject($data): array
    {
        $products=[];
        foreach ($data as $row){
            $products[]=new KeyWordsModel($row);
        }
        return $products;
    }
}