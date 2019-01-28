<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use Core\View;

/**
 * Class ProductController
 * @package App\Controllers
 */
class ProductController extends AppController
{
    /**
     * @return void
     * @param string $param
     */
    public function showAction($param = null): void
    {
        $products = $this->products;
        $categories = $this->categories;
        $product = ProductsModel::getProductWithImg('alias', $param);
        $brands = $this->brands;
        $this->set(compact('products', 'categories', 'brands', 'product'));
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Product", "action" => "show"], 'Site/default', 'show');
        $viewObj->rendor($this->data);
    }
}