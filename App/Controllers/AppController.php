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
use Core\Controller;
use Core\TSingletone;


/**
 * Class AppController
 * @package AppModel\Controllers
 */
class AppController extends Controller
{
    use TSingletone;

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
    public function __construct($route = '')
    {
        if ($route) {
            parent::__construct($route);
        }

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

    /**
     * @return mixed
     */
    public function getAdditionals()
    {
        return $this->additionals;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return mixed
     */
    public function getAttributesValues()
    {
        return $this->attributesValues;
    }

    /**
     * @return mixed
     */
    public function getCategoriesAttributes()
    {
        return $this->categoriesAttributes;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return mixed
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return mixed
     */
    public function getKeyWords()
    {
        return $this->keyWords;
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @return mixed
     */
    public function getProductsImages()
    {
        return $this->productsImages;
    }

    /**
     * @return mixed
     */
    public function getProductsKeyWords()
    {
        return $this->productsKeyWords;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }
}