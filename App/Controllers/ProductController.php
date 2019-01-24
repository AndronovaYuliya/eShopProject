<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

/**
 * Class ProductController
 * @package App\Controllers
 */
class ProductController extends Controller
{

    private $data = [];

    /**
     * @return void
     * @param array $params
     */
    public function showAction(array $params): void
    {
        $key = key($params);
        $this->data['product'] = ProductsModel::getProductWithImg($key, $params[$key]);
        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        parent::actionIndex('page/singleProductView.php', $this->data);
    }

    /**
     * @param array $params
     * @return void
     * show 1 product
     */
    public function brandAction(array $params): void
    {
        $key = key($params);
        $this->data['products'] = ProductsModel::getProductWithImg('brand', $params[$key]);
        $this->data['categories'] = CategoriesModel::query();

        parent::actionIndex('page/shopView.php', $this->data);
    }

    /**
     * @return void
     */
    public function indexAction(): void
    {
        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        parent::actionIndex('page/shopView.php', $this->data);
    }


    /**
     * @return void
     */
    public function categoryAction(): void
    {
        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        parent::actionIndex('page/shopView.php', $this->data);
    }

    /**
     * @return void
     */
    public function searchAction(): void
    {
        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        $pattern = '/\\W/';
        $search = preg_replace($pattern, ' ', trim($_POST['search']));
        $search = explode(' ', $search);

        $this->data['products'] = ProductsModel::getDataLike($search);

        parent::actionIndex('page/shopView.php', $this->data);
    }

    /**
     * @param array $params
     * @return void
     */
    public function keyAction(array $params): void
    {
        $key = key($params);
        $this->data['products'] = ProductsModel::getKeyData($params[$key]);
        $this->data['categories'] = CategoriesModel::query();

        parent::actionIndex('page/shopView.php', $this->data);
    }
}