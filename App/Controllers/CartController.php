<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

/**
 * Class CartController
 * @package App\Controllers
 */
class CartController extends Controller
{
    private $data = [];

    /**
     * @return void
     */
    public function indexAction(): void
    {
        $this->data = [];

        $this->data['products'] = ProductsModel::getFullData();
        $this->data['categories'] = CategoriesModel::query();

        parent::action_index('page/cartView.php', $this->data);
    }
}