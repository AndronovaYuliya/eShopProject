<?php

namespace App\Controllers;

use Core\Controller;
use Core\App;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

/**
 * Class ProductController
 * @package App\Controllers
 */
class ProductController extends Controller
{
    /**
     * @return void
     * @param string $param
     */
    public function showAction($param = null): void
    {
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        $products = ProductsModel::getFullData();
        $brands = $products;
        $categories = CategoriesModel::query();
        $this->set(compact('products', 'categories', 'brands', 'single'));
    }
}