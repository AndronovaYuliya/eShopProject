<?php

require dirname(__FILE__,2). '/vendor/autoload.php';

use CostumLogger\CostumLogger;
use Components\Core\Router;
use Components\Core\Database;
use Components\Core\Cache;
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
$cach=new Cache();


//Router::add('^$', ['controller'=>'Main','action'=>'index']);

Router::add('^$', ['controller'=>'Main','action'=>'index']);
Router::add('^\/product(\/index)?$', ['controller'=>'Product','action'=>'index']);
Router::add('^\/product\/show\?[a-z0-9-]+$', ['controller'=>'Product','action'=>'show']);
Router::add('^\/product\/category\?[a-z0-9-]+$', ['controller'=>'Product','action'=>'category']);
Router::add('^\/product\/search$', ['controller'=>'Product','action'=>'search']);
Router::add('^\/sender\/letter$', ['controller'=>'Sender','action'=>'letter']);
Router::add('^\/cart(\/index)?$', ['controller'=>'Cart','action'=>'index']);
Router::dispatch();



//$log->warning('Costum warning');



//phpinfo();

$db = Database::getInstance();


$mysqli = $db->getConnection();

$qr = $db->createTables();
/*KeyWordsModel::addFaker();
AttributesModel::addFaker();
ClientsModel::addFaker();
AttributesValuesModel::addFaker();
CategoriesModel::addFaker();
CategoriesAttributesModel::addFaker();
ImagesModel::addFaker();
ProductsModel::addFaker();
OrdersModel::addFaker();
CommentsModel::addFaker();
ProductsImagesModel::addFaker();
AdditionalsModel::addFaker();
ProductsKeyWordsModel::addFaker();
*/
