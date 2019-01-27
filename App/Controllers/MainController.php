<?php

namespace App\Controllers;

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
}