<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use Core\View;

/**
 * Class CategoryController
 * @package App\Controllers
 */
class CategoryController extends AppController
{
    /**
     * @param null $param
     * @throws \Exception
     */
    public function categoryAction($param = null): void
    {
        if (!$param) {
            $products = $this->products;
        } else {
            $products = ProductsModel::getDataByCategory('alias', $param);
        }
        $categories = $this->categories;
        $brands = $this->brands;
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