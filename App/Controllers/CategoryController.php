<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use Core\App;
use Core\Controller;
use Core\View;

class CategoryController extends Controller
{
    public function categoryAction(): void
    {
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        $products = ProductsModel::getFullData();
        $categories = CategoriesModel::query();
        $this->set(compact('products', 'categories'));
    }

    public function getView()
    {
        $viewObj = new View(["controller" => "Shop", "action" => "shop"], 'default', 'shop');
        $viewObj->rendor($this->data);
    }
}