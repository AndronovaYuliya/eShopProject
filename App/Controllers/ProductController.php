<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

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

        parent::action_index('page/singleProductView.php',$this->data);
    }

    //show 1 product
    public function brandAction($params)
    {
        $key=key($params);
        $this->data['products']=ProductsModel::getProductWithImg('brand', $params[$key]);
        $this->data['categories']=CategoriesModel::getData();
        parent::action_index('page/shopView.php',$this->data);
    }

    //show all products
    public function indexAction()
    {
        $this->data['products']=ProductsModel::getFullData();
        $this->data['categories']=CategoriesModel::getData();

        parent::action_index('page/shopView.php',$this->data);
    }

    //by categories
    public function categoryAction()
    {
        $this->data['products']=ProductsModel::getFullData();
        $this->data['categories']=CategoriesModel::getData();

        parent::action_index('page/shopView.php',$this->data);
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

        parent::action_index('page/shopView.php',$this->data);
    }

    public function keyAction($params)
    {
        $key=key($params);
        $this->data['products']= ProductsModel::getKeyData($params[$key]);
        $this->data['categories']=CategoriesModel::getData();
        parent::action_index('page/shopView.php',$this->data);
    }
}