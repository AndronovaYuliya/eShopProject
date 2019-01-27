<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use Core\View;

/**
 * Class ShopController
 * @package App\Controllers
 */
class ShopController extends AppController
{
    /**
     * @return void
     */
    public function shopAction(): void
    {
        $products = $this->products;
        $categories = $this->categories;
        $brands = $this->brands;
        $this->set(compact('products', 'categories', 'brands'));
    }

    /**
     * @return void
     */
    public function searchAction(): void
    {
        $categories = $this->categories;
        $brands = $this->brands;
        $pattern = '/\\W/';
        $search = preg_replace($pattern, ' ', trim($_POST['search']));
        $search = explode(' ', $search);
        $products = ProductsModel::getDataLike($search);
        $this->set(compact('products', 'categories', 'brands'));
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Shop", "action" => "shop"], 'default', 'shop');
        $viewObj->rendor($this->data);
    }
}