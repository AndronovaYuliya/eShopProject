<?php

class SingleproductController extends Controller
{
    function actionIndex($data, $singleProduct)
    {
        $this->view->generate('singleProductView.php',$data, $singleProduct);
    }
}