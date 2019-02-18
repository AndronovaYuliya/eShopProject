<?php

namespace App\Controllers;

use App\Mappers\ProductsMapper;
use App\Models\ProductsModel;
use Core\View;

/**
 * Class BrandController
 * @package AppModel\Controllers
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
            $products = ProductsMapper::getInstance()->findAll(' brand=:brand', [':brand' => $param]);
        }
        $brands = $this->products;
        $products = ProductsModel::getInstance()->getImages($products);
        $products = ProductsModel::getInstance()->getCategories($products);
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
        $viewObj = new View(["controller" => "Site/Shop", "action" => "shop"], 'Site/default', 'shop');
        $viewObj->rendor($this->data);
    }
}