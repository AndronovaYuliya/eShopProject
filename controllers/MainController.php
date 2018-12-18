<?php

class MainController extends Controller
{
    private $data=[];

    public function show()
    {
        $this->data=ProductModel::getProducts();
        $this->actionIndex();
    }

    //view
    public function actionIndex()
    {
        $this->view->generate('mainView.php',$this->data);
    }
}