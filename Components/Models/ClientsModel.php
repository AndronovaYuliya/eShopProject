<?php

namespace Components\Models;

use Components\Mappers\ClientsMapper;

class ClientsModel extends AbstractTableModel
{
    private $_id;
    private $_name;
    private $_login;
    private $_password;
    private $_email;
    private $_phone;
    private $_city;
    private $_address;
    private $_born;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_name=isset($data['name'])?$data['name']:null;
            $this->_login=isset($data['login'])?$data['login']:null;
            $this->_password=isset($data['password'])?$data['password']:null;
            $this->_email=isset($data['email'])?$data['email']:null;
            $this->_phone=isset($data['phone'])?$data['phone']:null;
            $this->_city=isset($data['city'])?$data['city']:null;
            $this->_address=isset($data['address'])?$data['address']:null;
            $this->_born=isset($data['born'])?$data['born']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker():void
    {
        ClientsMapper::addData();
    }

    public static function getData(): array
    {
        return ClientsMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ClientsMapper::getDataWhere($byWhat, $name);
    }

    protected function toObject($data):array
    {
        $products=[];
        foreach ($data as $row){
            $products[]=new ClientsModel($row);
        }
        return $products;
    }
}