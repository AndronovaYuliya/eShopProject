<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

class CartController extends Controller
{
    private $data = [];

    public function indexAction()
    {
        $this->data = [];

        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::getData();

        parent::action_index('page/cartView.php',$this->data);
    }
}