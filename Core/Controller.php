<?php

namespace Core;

use Core\View;

/**
 * Class Controller
 * @package Core
 */
class Controller
{
    public $model;

    /**
     * @param string $content
     * @param array $data
     */
    protected function action_index(string $content, array $data=[]): void
    {
        View::generate($content, $data);
    }
}
