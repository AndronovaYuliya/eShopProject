<?php

namespace Core;

/**
 * Class Controller
 * @package Core
 */
class Controller
{
    public $model;
    public $view;

    /**
     * Controller constructor.
     */
    function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param string $content
     * @param array $data
     * @return void
     */
    protected function action_index(string $content, array $data): void
    {
        $this->view->generate($content, $data);
    }
}
