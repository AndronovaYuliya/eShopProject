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
     * @throws \Exception
     */
    public function shopAction(): void
    {
        $products = $this->products;
        $categories = $this->categories;
        $brands = $this->brands;
        $this->set(compact('products', 'categories', 'brands'));
        $this->getView();
    }

    /**
     * @throws \Exception
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
        $this->getView();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Shop", "action" => "shop"], 'Site/default', 'shop');
        $viewObj->rendor($this->data);
    }
}