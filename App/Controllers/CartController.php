<?php

namespace App\Controllers;

use Core\View;

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

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Cart", "action" => "cart"], 'Site/default', 'cart');
        $viewObj->rendor($this->data);
    }
}