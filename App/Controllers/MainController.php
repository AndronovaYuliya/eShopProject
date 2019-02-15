<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use Core\View;

/**
 * Class MainController
 * @package AppModel\Controllers
 */
class MainController extends AppController
{
    /**
     * @throws \Exception
     */
    public function indexAction(): void
    {
        $brands = $this->products;
        $products = $this->products;
        $products=ProductsModel::getInstance()->getImages($products);
        $products=ProductsModel::getInstance()->getCategories($products);
        $categories = $this->categories;
        $this->set(compact('products', 'categories', 'brands'));
        $this->getView();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Main", "action" => "index"], 'Site/default', 'index');
        $viewObj->rendor($this->data);
    }
}