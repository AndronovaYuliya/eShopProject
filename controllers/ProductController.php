<?php

class ProductController extends Controller
{

    private $data=[];
    private $singleProduct=[];

    //show 1 product
    public function product($params)
    {
        $this->singleProduct=ProductModel::getProduct($params);
        $this->data=ProductModel::getProducts();
        $this->testForException();
        $this->view->generate('singleProductView.php',$this->data, $this->singleProduct);
    }

    //show all products
    public function show()
    {
        $this->data=ProductModel::getProducts();
        $this->actionIndex();
    }

    //view
    public function actionIndex()
    {
        $this->view->generate('shopView.php',$this->data);
    }

    private function testForException(){
        9/0;
        throw new MyException('Неперехватываемое исключение');

    }
}