<?php

namespace App\Controllers;

/**
 * Class CartController
 * @package App\Controllers
 */
class CartController extends AppController
{
    /**
     * @return void
     */
    public function cartAction(): void
    {
        $products = $this->products;
        $categories = $this->categories;
        $brands = $this->brands;
        $this->set(compact('products', 'categories', 'brands'));
    }
}