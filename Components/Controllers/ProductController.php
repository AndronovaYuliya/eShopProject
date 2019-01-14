<?php

namespace Components\Controllers;

use Components\Core\Controller;
use Components\Models\ProductModel;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;


class ProductController extends Controller
{

    private $data=[];
    private $singleProduct=[];

    //show 1 product
    public function product($params)
    {
        $data=new ProductModel();
        $this->data=$data->product($params);

        $this->view->generate('singleProductView.php',$this->data);
    }

    //show all products
    public function show()
    {
        $this->data=[];
        $products=new ProductsModel();
        $categories=new CategoriesModel();

        $this->data['products']=$products->getProductsWithImg();
        $this->data['categories']=$categories->getCategories();


        $this->actionIndex();
    }

    //by categories
    public function category($params)
    {
        $this->data=[];
        $products=new ProductsModel();
        $categories=new CategoriesModel();

        $this->data['categories']=$categories->getCategories();
        $this->data['products']=$products->getDataByCategory('id_category', $params['id']);

        $this->view->generate('shopView.php',$this->data);
    }

    //search
    public function search()
    {
        $this->data=[];
        $products=new ProductsModel();
        $categories=new CategoriesModel();

        $this->data['categories']=$categories->getCategories();
        $this->data['products']=$products->getProductsWithImg();

        var_dump($this->data['products']);
        //var_dump($_POST);die();
    }

    //view
    public function actionIndex()
    {
        $this->view->generate('shopView.php',$this->data);
    }

}