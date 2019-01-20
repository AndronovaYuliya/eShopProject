<?php

namespace Core;

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param string $content
     * @param array $data
     */
    protected function action_index(string $content, array $data)
    {
        $this->view->generate($content, $data);
    }
}
