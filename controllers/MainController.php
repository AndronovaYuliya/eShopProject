<?php

class MainController extends Controller
{
    function actionIndex($data)
    {
        $this->view->generate('mainView.php', 'templateView.php',$data);
    }
}