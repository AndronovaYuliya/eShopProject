<?php

namespace App\Controllers\Admin;

use App\Models\AdditionalsModel;
use App\Models\Admin\TableModel;
use App\Models\AttributesModel;
use App\Models\AttributesValuesModel;
use App\Models\CategoriesAttributesModel;
use App\Models\CategoriesModel;
use App\Models\ClientsModel;
use App\Models\CommentsModel;
use App\Models\ImagesModel;
use App\Models\KeyWordsModel;
use App\Models\OrdersModel;
use App\Models\ProductsImagesModel;
use App\Models\ProductsKeyWordsModel;
use App\Models\ProductsModel;
use App\Models\SessionModel;
use Core\Controller;
use Core\App;
use App\Models\Admin\AdminModel;
use Core\Session;

/**
 * Class AdminAppController
 * @package App\Controllers\Admin
 */
class AdminAppController extends Controller
{
    protected $admins = [];
    protected $admin;
    protected $tables;
    protected $additionals;
    protected $attributes;
    protected $attributes_values;
    protected $categories;
    protected $categories_attributes;
    protected $clients;
    protected $comments;
    protected $images;
    protected $key_words;
    protected $orders;
    protected $products;
    protected $products_images;
    protected $products_key_words;
    protected $sessions;
    protected $users;

    /**
     * AdminAppController constructor.
     * @param $route
     * @throws \Exception
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->layout = 'Admin/default';
        $this->updateDatas();
        Session::addToSession();
        $this->setMeta(App::$app->getProperty('title'), 'Admin', 'admin');
    }

    /**
     * @throws \Exception
     */
    protected function updateDatas(): void
    {
        $this->admins = AdminModel::getAdmins();
        $this->tables = TableModel::getTables();
        $this->additionals = AdditionalsModel::query();
        $this->attributes = AttributesModel::query();
        $this->attributes_values = AttributesValuesModel::query();
        $this->categories = CategoriesModel::query();
        $this->categories_attributes = CategoriesAttributesModel::query();
        $this->clients = ClientsModel::query();
        $this->comments = CommentsModel::query();
        $this->images = ImagesModel::query();
        $this->key_words = KeyWordsModel::query();
        $this->orders = OrdersModel::query();
        $this->products = ProductsModel::query();
        $this->products_images = ProductsImagesModel::query();
        $this->products_key_words = ProductsKeyWordsModel::query();
        $this->sessions = SessionModel::query();
        $this->users = $this->admins;
        $this->admin=Session::get('admin');
    }
}