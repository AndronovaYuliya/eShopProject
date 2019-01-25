<?php

namespace App\Controllers;

use Core\Controller;
use Core\App;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;
use Core\View;

/**
 * Class BrandController
 * @package App\Controllers
 */
class BrandController extends Controller
{
    /**
     * @param string $param
     * @return void
     */
    public function brandAction($param = null): void
    {
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        if (!$param) {
            $products = ProductsModel::getFullData();
        } else {
            $products = ProductsModel::getProductWithImg('brand', $param);
        }
        $brands = ProductsModel::query();
        $categories = CategoriesModel::query();
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