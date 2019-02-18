<?php

namespace App\Controllers;

use App\Mappers\CategoriesMapper;
use App\Models\ProductsModel;
use Core\View;

/**
 * Class CategoryController
 * @package AppModel\Controllers
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
            $products = CategoriesMapper::getInstance()->findAll(' alias=:alias', [':alias' => $param]);
        }
        $categories = $this->categories;
        $brands = $this->products;
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