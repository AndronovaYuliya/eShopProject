<?php

namespace Components\Controllers;

use Components\Core\Controller;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;

class ProductController extends Controller
{

    private $data=[];

    //show 1 product
    public function showAction($params)
    {
        $key=key($params);
        $this->data['product']=ProductsModel::getProductWithImg($key, $params[$key]);
        $this->data['products']=ProductsModel::getFullData();
        $this->data['categories']=CategoriesModel::getData();

        $this->actionIndex('singleProductView.php');
    }

    //show all products
    public function indexAction()
    {
        $this->data['products']=ProductsModel::getFullData();
        $this->data['categories']=CategoriesModel::getData();

        $this->actionIndex('shopView.php');
    }

    //by categories
    public function categoryAction($params)
    {
        $this->data['products']=ProductsModel::getFullData();
        $this->data['categories']=CategoriesModel::getData();

        $this->actionIndex('shopView.php');
    }

    //search
    public function searchAction()
    {
        $this->data['products']=ProductsModel::getFullData();
        $this->data['categories']=CategoriesModel::getData();

        $pattern='/\\W/';
        $search=preg_replace($pattern, ' ', trim($_POST['search']));
        $search=explode(' ',$search);

        $this->data['products']=ProductsModel::getDataLike($search);

        $this->actionIndex('shopView.php');
    }

    //view
    private function actionIndex(string $content)
    {
        $this->view->generate($content,$this->data);
    }
}