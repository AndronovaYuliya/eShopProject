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
     * @return void
     */
    protected function actionIndex(string $content, array $data = []): void
    {
        View::generate($content, $data);
    }
}
