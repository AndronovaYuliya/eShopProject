<?php

namespace Components\Models;

use Components\Mappers\CommentsMapper;

class CommentsModel extends AbstractTableModel
{
    private $_id;
    private $_msg;
    private $_user;
    private $_id_product;
    private $_stars;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_msg=isset($data['msg'])?$data['msg']:null;
            $this->_user=isset($data['user'])?$data['user']:null;
            $this->_id_product=isset($data['id_product'])?$data['id_product']:null;
            $this->_stars=isset($data['stars'])?$data['stars']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker(): void
    {
        CommentsMapper::addData();
    }

    public function getData(): array
    {
        $comments=[];
        $data=CommentsMapper::getData();
        foreach ($data as $row){
            $comments[]=new CommentsModel($row);
        }
        return $comments;
    }

    public function getDataWhere(string $byWhat, string $name): array
    {
        $comments=[];
        $data=CommentsMapper::getDataWhere($byWhat, $name);
        foreach ($data as $row){
            $comments[]=new CommentsModel($row);
        }
        return $comments;
    }
}