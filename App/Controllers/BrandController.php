<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use Core\View;

/**
 * Class BrandController
 * @package App\Controllers
 */
class BrandController extends AppController
{
    /**
     * @param null $param
     * @throws \Exception
     */
    public function brandAction($param = null): void
    {
        if (!$param) {
            $products = $this->products;
        } else {
            $products = ProductsModel::getProductWithImg('brand', $param);
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