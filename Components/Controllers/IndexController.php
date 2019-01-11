<?php

namespace Components\Controllers;

use Components\Core\Controller;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;

class IndexController extends Controller
{
    private $data=[];

    public function show()
    {
        $this->data=[];
        $products=new ProductsModel();
        $categories=new CategoriesModel();

        $this->data['products']=$products->getDataWithImg();
        $this->data['categories']=$categories->getData();

        $this->actionIndex();
    }

    //view
    public function actionIndex()
    {
        $this->view->generate('mainView.php',$this->data);
    }
}