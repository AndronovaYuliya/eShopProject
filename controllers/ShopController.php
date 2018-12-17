<?php

class ShopController extends Controller
{
    function actionIndex($data)
    {
        $this->view->generate('shopView.php',$data);
    }
}