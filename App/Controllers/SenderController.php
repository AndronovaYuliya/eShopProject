<?php

namespace App\Controllers;

use Core\Controller;
use http\Env\Response;
use Sender\Sender;

/**
 * Class SenderController
 * @package App\Controllers
 */
class SenderController extends Controller
{
    /**
     * @return void
     */
    public function letterAction(): void
    {
        Sender::sendMsg();
//???        Response::redirect
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        $products = ProductsModel::getFullData();
        $categories = CategoriesModel::query();
        $this->set(compact('products', 'categories'));
    }

    /**
     * @return void
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Main", "action" => "index"], 'default', 'index');
        $viewObj->rendor($this->data);
    }
}