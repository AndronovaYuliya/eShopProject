<?php

namespace App\Controllers;

use App\Mappers\ProductsMapper;
use App\Models\ProductsModel;
use Core\View;

/**
 * Class ProductController
 * @package AppModel\Controllers
 */
class ProductController extends AppController
{
    /**
     * @param null $param
     * @throws \Exception
     */
    public function showAction($param = null): void
    {
        $product = ProductsMapper::getInstance()->findOne(' alias=:alias', [':alias' => $param]);
        $product = ProductsModel::getInstance()->getImage($product);
        $product = ProductsModel::getInstance()->getCategory($product);
        $product = ProductsModel::getInstance()->getKeyWord($product);

        $products = $this->products;
        $brands = $products;

        $products = ProductsModel::getInstance()->getImages($products);
        $products = ProductsModel::getInstance()->getCategories($products);

        $categories = $this->categories;

        $this->set(compact('products', 'categories', 'brands', 'product'));
        $this->getView();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Product", "action" => "show"], 'Site/default', 'show');
        $viewObj->rendor($this->data);
    }
}