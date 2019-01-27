<?php

namespace App\Controllers;

use App\Models\ProductsModel;

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
}