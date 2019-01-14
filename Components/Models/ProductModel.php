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

    public function product():ProductModel
    {
        $this->products=$this->products->getProductsWithImg();

        echo "<pre>";var_dump($this->products);die();
        $this->categories=$this->categories->getCategories();
        return $this;
    }

}
