<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

class ProductController extends Controller
{

    private $data = [];

    /**
     * @param array $params
     * show 1 product
     */
    public function showAction(array $params)
    {
        $key = key($params);
        $this->data['product'] = ProductsModel::getProductWithImg($key, $params[$key]);
        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        parent::action_index('page/singleProductView.php', $this->data);
    }

    /**
     * @param array $params
     * show 1 product
     */
    public function brandAction(array $params)
    {
        $key = key($params);
        $this->data['products'] = ProductsModel::getProductWithImg('brand', $params[$key]);
        $this->data['categories'] = CategoriesModel::query();
        parent::action_index('page/shopView.php', $this->data);
    }

    //show all products
    public function indexAction()
    {
        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        parent::action_index('page/shopView.php', $this->data);
    }

    //by categories
    public function categoryAction()
    {
        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        parent::action_index('page/shopView.php', $this->data);
    }

    //search
    public function searchAction()
    {
        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        $pattern = '/\\W/';
        $search = preg_replace($pattern, ' ', trim($_POST['search']));
        $search = explode(' ', $search);

        $this->data['products'] = ProductsModel::getDataLike($search);

        parent::action_index('page/shopView.php', $this->data);
    }

    /**
     * @param array $params
     */
    public function keyAction(array $params)
    {
        $key = key($params);
        $this->data['products'] = ProductsModel::getKeyData($params[$key]);
        $this->data['categories'] = CategoriesModel::query();
        parent::action_index('page/shopView.php', $this->data);
    }
}