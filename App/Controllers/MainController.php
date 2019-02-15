<?php

namespace App\Controllers;

use Core\View;

/**
 * Class MainController
 * @package AppModel\Controllers
 */
class MainController extends AppController
{
    /**
     * @throws \Exception
     */
    public function indexAction(): void
    {
        $products = $this->products;
        $categories = $this->categories;
        $brands = $this->brands;
        $this->set(compact('products', 'categories', 'brands'));
        $this->getView();
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