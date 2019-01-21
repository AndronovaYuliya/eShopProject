<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

class MainController extends Controller
{
    private $data = [];

    public function indexAction()
    {
        $this->data = [];

        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        parent::action_index('page/mainView.php', $this->data);
    }
}