<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use Core\App;
use Core\Controller;

/**
 * Class MainController
 * @package App\Controllers
 */
class MainController extends Controller
{
    /**
     * @return void
     */
    public function indexAction(): void
    {
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        $products = ProductsModel::getFullData();
        $categories = CategoriesModel::query();
        $this->set(compact('products', 'categories'));
    }
}