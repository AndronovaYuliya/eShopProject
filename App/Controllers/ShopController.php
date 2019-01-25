<?php

namespace App\Controllers;

use Core\Controller;
use Core\App;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

/**
 * Class ShopController
 * @package App\Controllers
 */
class ShopController extends Controller
{
    /**
     * @return void
     */
    public function shopAction(): void
    {
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        $products = ProductsModel::getFullData();
        $brands = $products;
        $categories = CategoriesModel::query();
        $this->set(compact('products', 'categories', 'brands'));
    }

    public function searchAction()
    {
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        $categories = CategoriesModel::query();
        $brands = ProductsModel::getFullData();
        $pattern = '/\\W/';
        $search = preg_replace($pattern, ' ', trim($_POST['search']));
        $search = explode(' ', $search);
        $products = ProductsModel::getDataLike($search);
        $this->set(compact('products', 'categories', 'brands'));
    }
}