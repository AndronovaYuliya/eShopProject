<?php

namespace App\Controllers;

use App\Mappers\ProductsMapper;
use App\Models\ProductsModel;
use Core\View;

/**
 * Class ShopController
 * @package AppModel\Controllers
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
        $brands = $products;
        $products = ProductsModel::getInstance()->getImages($products);
        $products = ProductsModel::getInstance()->getCategories($products);

        $this->set(compact('products', 'categories', 'brands'));
        $this->getView();
    }

    /**
     * @throws \Exception
     */
    public function searchAction(): void
    {
        $categories = $this->categories;
        $brands = $this->products;
        $products = ProductsModel::getInstance()->getLike(trim($_POST['search']));
        $products = ProductsModel::getInstance()->getImages($products);
        $products = ProductsModel::getInstance()->getCategories($products);
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