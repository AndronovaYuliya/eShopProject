<?php

namespace Components\Controllers;

use Components\Core\Controller;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;

class MainController extends Controller
{
    private $data=[];

    public function indexAction()
    {
        $this->data=[];

        $this->data['products']=ProductsModel::getFullData();
        $this->data['categories']=CategoriesModel::getData();

        $this->actionIndex('mainView.php');
    }

    //view
    private function actionIndex(string $content)
    {
        $this->view->generate($content,$this->data);
    }
}