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
     * @throws \Exception
     */
    public function __construct($route)
    {
        parent::__construct($route);
        try {
            $this->brands = ProductsModel::query();
        } catch (\PDOException $exception) {
            throw new \Exception("Sql wrong: {$exception}", 100);
        }

        try {
            $this->categories = CategoriesModel::query();
        } catch (\PDOException $exception) {
            throw new \Exception("Sql wrong: {$exception}", 100);
        }

        try {
            $this->products = ProductsModel::getFullData();
        } catch (\PDOException $exception) {
            throw new \Exception("Sql wrong: {$exception}", 100);
        }

        try {
            $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        } catch (\PDOException $exception) {
            throw new \Exception("Sql wrong: {$exception}", 100);
        }
    }
}