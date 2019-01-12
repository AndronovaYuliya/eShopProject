<?php

require dirname(__FILE__,2). '/vendor/autoload.php';

use CostumLogger\CostumLogger;
use Components\Core\Router;
use Components\Core\Database;
use Components\Models\ClientsModel;
use Components\Models\AttributesModel;
use Components\Models\ImagesModel;
use Components\Models\AttributesValuesModel;
use Components\Models\CategoriesModel;
use Components\Models\ProductsModel;
use Components\Models\OrdersModel;
use Components\Models\AdditionalsModel;
use Components\Models\CategoriesAttributesModel;
use Components\Models\CommentsModel;
use Components\Models\ProductsImagesModel;
use Components\Models\KeyWordsModel;
use Components\Models\ProductsKeyWordsModel;

$log=new CostumLogger();
Router::routing();

//$log->warning('Costum warning');



//phpinfo();

$db = Database::getInstance();


$mysqli = $db->getConnection();

//$qr = $db->createTables();

/*$keyWords=new KeyWordsModel();
$keyWords->addFaker();
$attributes=new AttributesModel();
$attributes->addFaker();
$clients=new ClientsModel();
$clients->addFaker();
$attributesValues=new AttributesValuesModel();
$attributesValues->addFaker();
$categories=new CategoriesModel();
$categories->addFaker();
$categoriesAttributes=new CategoriesAttributesModel();
$categoriesAttributes->addFaker();
$images=new ImagesModel();
$images->addFaker();
$products=new ProductsModel();
$products->addFaker();
$orders=new OrdersModel();
$orders->addFaker();
$comments=new CommentsModel();
$comments->addFaker();
$productsImages=new ProductsImagesModel();
$productsImages->addFaker();
$additionals=new AdditionalsModel();
$additionals->addFaker();
$rr=new ProductsKeyWordsModel();
$rr->addFaker();*/




