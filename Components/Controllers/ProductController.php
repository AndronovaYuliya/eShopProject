<?php

namespace Components\Controllers;

use Components\Core\Controller;
use Components\Models\ProductModel;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;


class ProductController extends Controller
{

    private $data=[];

    //show 1 product
    public function product($params)
    {
        $key=key($params);
        $this->data['product']=ProductsModel::getProductWithImg($key, $params[$key]);
        $this->data['products']=ProductsModel::getData();
        $this->data['categories']=CategoriesModel::getData();

        $this->view->generate('singleProductView.php',$this->data);
    }

    //show all products
    public function show()
    {
        $this->data['products']=ProductsModel::getData();
        $this->data['categories']=CategoriesModel::getData();

        $this->actionIndex();
    }

    //by categories
    public function category($params)
    {
        $this->data['products']=ProductsModel::getData();
        $this->data['categories']=CategoriesModel::getData();

        $this->view->generate('shopView.php',$this->data);
    }

    //search
    public function search()
    {
        $this->data['products']=ProductsModel::getData();
        $this->data['categories']=CategoriesModel::getData();

        $pattern='/\\W/';
        $search=preg_replace($pattern, ' ', trim($_POST['search']));
        $search=explode(' ',$search);

        $this->data['products']=ProductsModel::getDataLike($search);
        $this->view->generate('shopView.php',$this->data);

    }

    //view
    public function actionIndex()
    {
        $this->view->generate('shopView.php',$this->data);
    }

}