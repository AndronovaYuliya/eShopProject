<?php

class ShopGoodsModel{
    private static $goods;

    public function __construct()
    {
        self::$goods=DataBaseModel::getDB();
    }



    public static function getGoods():array {
        return self::$goods;
    }

    private static function getKey($id){
        return array_search($id, array_column(self::$goods, 'id'));
    }

    public static function getGood($id){
        $key= self::getKey($id);
        return self::$goods[$key];
    }


}
