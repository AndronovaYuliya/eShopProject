<?php
class DataBaseModel{
    public static function getDB(){
        //+проверка
        $data = file_get_contents('array.txt');
        $data = unserialize($data);
        return $data;
    }
}