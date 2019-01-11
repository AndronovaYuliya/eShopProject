<?php

namespace Components\Controllers;

use Components\Core\Controller;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;

class MainController extends Controller
{
    private $data=[];

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
        $this->view->generate('mainView.php',$this->data);
    }
}