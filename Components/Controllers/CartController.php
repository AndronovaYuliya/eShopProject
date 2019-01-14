<?php

namespace Components\Controllers;

use Components\Core\Controller;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;

class CartController extends Controller
{
    private $data=[];

    public function show()
    {
        $this->data=[];

        $this->data['products']=ProductsModel::getData();
        $this->data['categories']=CategoriesModel::getData();

        $this->actionIndex();
    }

    //view
    public function actionIndex()
    {
        $this->view->generate('cartView.php',$this->data);
    }
}