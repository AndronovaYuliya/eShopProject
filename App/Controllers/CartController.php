<?php

namespace App\Controllers;

use Core\Controller;
use Core\App;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

/**
 * Class CartController
 * @package App\Controllers
 */
class CartController extends Controller
{
    public function cartAction(): void
    {
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        $products = ProductsModel::getFullData();
        $brands = $products;
        $categories = CategoriesModel::query();
        $this->set(compact('products', 'categories', 'brands'));
    }
}