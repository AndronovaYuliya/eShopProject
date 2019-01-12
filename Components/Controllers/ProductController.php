<?php

namespace Components\Controllers;

use Components\Core\Controller;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;


class ProductController extends Controller
{

    private $data=[];
    private $singleProduct=[];

    //show 1 product
    public function product($params)
    {
        $this->data=[];
        $products=new ProductsModel();
        $categories=new CategoriesModel();

        $this->data['product']=$products->getProductWithImg('id', $params['id']);
        $this->data['products']=$products->getProductsWithImg();
        $this->data['categories']=$categories->getCategories();

        $this->view->generate('singleProductView.php',$this->data, $this->singleProduct);
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

    //view
    public function actionIndex()
    {
        $this->view->generate('shopView.php',$this->data);
    }
}