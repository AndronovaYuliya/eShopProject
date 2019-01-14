<?php

namespace Components\Models;

use Components\Core\MyException;
use Components\Models\DataBaseModel;
use Components\Core\Controller;
use Components\Models\ProductsModel;
use Components\Models\CategoriesModel;


class ProductModel
{
    private $product;
    private $products;
    private $categories;


    public function __construct()
    {
        $this->categories=new CategoriesModel();
        $this->products=new ProductsModel();
        $this->product=new ProductsModel();
    }

    public function getCategories()
    {
        $this->categories=$this->categories->getCategories();
    }

    public function getProductsWithImg()
    {
        $this->products=$this->products->getProductsWithImg();
    }

    public function product($params):ProductModel
    {
        $this->products=$this->products->getProductsWithImg();
        $this->categories=$this->categories->getCategories();
        $this->product=$this->product->getProductWithImg('id', $params['id']);
        return $this;
    }

}
