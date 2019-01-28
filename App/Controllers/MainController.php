<?php

namespace App\Controllers;

use Core\View;

/**
 * Class MainController
 * @package App\Controllers
 */
class MainController extends AppController
{
    /**
     * @return void
     */
    public function indexAction(): void
    {
        $products = $this->products;
        $categories = $this->categories;
        $brands = $this->brands;
        $this->set(compact('products', 'categories', 'brands'));
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Main", "action" => "index"], 'Site/default', 'index');
        $viewObj->rendor($this->data);
    }
}