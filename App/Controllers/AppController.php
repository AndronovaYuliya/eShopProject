<?php

namespace App\Controllers;

use App\Mappers\AdditionalsMapper;
use App\Mappers\AttributesMapper;
use App\Mappers\AttributesValuesMapper;
use App\Mappers\CategoriesAttributesMapper;
use App\Mappers\CategoriesMapper;
use App\Mappers\ClientsMapper;
use App\Mappers\CommentsMapper;
use App\Mappers\ImagesMapper;
use App\Mappers\KeyWordsMapper;
use App\Mappers\OrdersMapper;
use App\Mappers\ProductsImagesMapper;
use App\Mappers\ProductsKeyWordsMapper;
use App\Mappers\ProductsMapper;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;
use Core\Controller;
use Core\App;


/**
 * Class AppController
 * @package AppModel\Controllers
 */
class AppController extends Controller
{
    protected $additionals;
    protected $attributes;
    protected $attributesValues;
    protected $categoriesAttributes;
    protected $categories;
    protected $clients;
    protected $comments;
    protected $images;
    protected $keyWords;
    protected $orders;
    protected $productsImages;
    protected $productsKeyWords;
    protected $products;

    /**
     * AppController constructor.
     * @param $route
     * @throws \Exception
     */
    public function __construct($route)
    {
        parent::__construct($route);

        $this->additionals = AdditionalsMapper::getInstance()->findAll();
        $this->attributes = AttributesMapper::getInstance()->findAll();
        $this->attributesValues = AttributesValuesMapper::getInstance()->findAll();
        $this->categoriesAttributes = CategoriesAttributesMapper::getInstance()->findAll();
        $this->categories = CategoriesMapper::getInstance()->findAll();
        $this->clients = ClientsMapper::getInstance()->findAll();
        $this->comments = CommentsMapper::getInstance()->findAll();
        $this->images = ImagesMapper::getInstance()->findAll();
        $this->keyWords = KeyWordsMapper::getInstance()->findAll();
        $this->orders = OrdersMapper::getInstance()->findAll();
        $this->productsImages = ProductsImagesMapper::getInstance()->findAll();
        $this->productsKeyWords = ProductsKeyWordsMapper::getInstance()->findAll();
        $this->products = ProductsMapper::getInstance()->findAll();
    }
}