<?php
class ProductController {

    private static $data=[];

    //show all products
    public static function product()
    {
        return ProductModel::getProducts();

    }

    //show 1 product
    public static function show($params,$query)
    {
        return ProductModel::getProduct($query);
    }



}
