<?php

namespace Components\Controllers;

use Components\Core\Controller;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;

class CartController extends Controller
{
    private $data=[];

    public function indexAction()
    {
        $this->data=[];

        $this->data['products']=ProductsModel::getFullData();
        $this->data['categories']=CategoriesModel::getData();

        parent::action_index('cartView.php',$this->data);
    }
}