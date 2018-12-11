<?php
class ShopGoods{
    private static $goods=[
        [
            'id'=>1,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>2,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>3,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>4,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>5,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>6,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>7,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>8,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>9,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>10,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>11,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ],[
            'id'=>12,
            'title'=>'Apple new mac book 2015 March',
            'new_price'=>'899.00',
            'old_price'=>'999.00',
            'count'=>'10',
            'visible'=>true,
            'currency'=>'$',
            'img'=>'/img/product-1.jpg'
        ]
    ];

    public static function getGoods():array {
        return self::$goods;
    }

    private static function getKey($id){
        return array_search($id, array_column(self::$goods, 'id'));
    }

    public static function getGood($id){
        $key= getKey($id);
        return self::$goods[$key];
    }


}
