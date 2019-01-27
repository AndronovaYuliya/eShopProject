<?php

namespace App\Controllers;

/**
 * Class ContactController
 * @package App\Controllers
 */
class ContactController extends AppController
{
    /**
     * @return void
     */
    public function contactAction(): void
    {
        $products = $this->products;
        $categories = $this->categories;
        $brands = $this->brands;
        $this->set(compact('products', 'categories', 'brands'));
    }
}