<?php

namespace Components\Core;


class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    protected function action_index(string $content, $data)
    {
        $this->view->generate($content,$data);
    }
}
