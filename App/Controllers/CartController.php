<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProductsModel;
use Core\View;

/**
 * Class CartController
 * @package App\Controllers
 */
class CartController extends AppController
{
    /**
     * @return void
     */
    public function cartAction(): void
    {
        $products = $this->products;
        $categories = $this->categories;
        $brands = $this->brands;
        $this->set(compact('products', 'categories', 'brands'));
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Cart", "action" => "cart"], 'Site/default', 'cart');
        $viewObj->rendor($this->data);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function addAction()
    {
        $id = !empty($_POST['id']) ? (int)$_POST['id'] : 1;
        $qty = !empty($_POST['qty']) ? (int)$_POST['qty'] : 1;
        $product = ProductsModel::getDataWhere('id', $id);
        if (!$product) {
            return false;
        }
        $cart = new CartModel();
        $cart->addToCart($product, $qty);
        if ($this->isAjax()) {
            $this->route = ["controller" => "Site/Cart", "action" => "cart"];
            $this->layout = 'Site/default';
            $this->view = 'cart';
        }
        $this->getView();
    }
}