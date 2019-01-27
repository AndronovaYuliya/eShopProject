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
     * @return void
     * @param string $param
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
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Shop", "action" => "shop"], 'default', 'shop');
        $viewObj->rendor($this->data);
    }
}