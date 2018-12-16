<?php
class ProductController {

    private static $data=[];

    /*public function __construct()
    {
        $this->data=$this->getProducts();
    }
*/
    //show all products
    public static function all()
    {
        return ProductModel::getProducts();

    }

    //show 1 product
    public static function show($params,$query)
    {
        return ProductModel::getProduct($query);
    }



}
