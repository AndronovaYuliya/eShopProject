<?php

namespace Components\Models;

use Components\Mappers\OrdersMapper;

class OrdersModel extends AbstractTableModel
{
    private $_id;
    private $_date;
    private $_sum;
    private $_status;
    private $_ttn;
    private $_id_client;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_date=isset($data['date'])?$data['date']:null;
            $this->_sum=isset($data['sum'])?$data['sum']:null;
            $this->_status=isset($data['status'])?$data['status']:null;
            $this->_ttn=isset($data['ttn'])?$data['ttn']:null;
            $this->_id_client=isset($data['id_client'])?$data['id_client']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker(): void
    {
        OrdersMapper::addData();
    }

    public function getData(): array
    {
        $orders=[];
        $data=OrdersMapper::getData();
        foreach ($data as $row){
            $orders[]=new OrdersModel($row);
        }
        return $orders;
    }

    public function getDataWhere(string $byWhat, string $name): array
    {
        $orders=[];
        $data=OrdersMapper::getDataWhere($byWhat, $name);
        foreach ($data as $row){
            $orders[]=new OrdersModel($row);
        }
        return $orders;
    }
}