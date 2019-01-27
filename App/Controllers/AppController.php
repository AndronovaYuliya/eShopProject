<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use App\Models\CategoriesModel;
use Core\Controller;
use Core\App;

/**
 * Class AppController
 * @package App\Controllers
 */
class AppController extends Controller
{
    protected $categories;
    protected $brands;
    protected $products;

    /**
     * AppController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->brands = ProductsModel::query();
        $this->categories = CategoriesModel::query();
        $this->products = ProductsModel::getFullData();
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
    }
}