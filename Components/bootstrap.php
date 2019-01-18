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
use Components\Models\UserModel;

$log=new CostumLogger();
$cach=new Cache();


//Router::add('^$', ['controller'=>'Main','action'=>'index']);

Router::add('^$', ['controller'=>'Main','action'=>'index']);
Router::add('^\/product(\/index)?$', ['controller'=>'Product','action'=>'index']);
Router::add('^\/product\/show\?[a-z0-9-]+$', ['controller'=>'Product','action'=>'show']);
Router::add('^\/product\/brand\?[a-z0-9-]+$', ['controller'=>'Product','action'=>'brand']);
Router::add('^\/product\/category\?[a-z0-9-]+$', ['controller'=>'Product','action'=>'category']);
Router::add('^\/product\/key\?[a-z0-9-]+$', ['controller'=>'Product','action'=>'key']);
Router::add('^\/product\/search$', ['controller'=>'Product','action'=>'search']);
Router::add('^\/product\/brand', ['controller'=>'Product','action'=>'brand']);
Router::add('^\/sender\/letter$', ['controller'=>'Sender','action'=>'letter']);
Router::add('^\/cart(\/index)?$', ['controller'=>'Cart','action'=>'index']);
Router::add('^\/cart(\/show)?$', ['controller'=>'Cart','action'=>'show']);
Router::add('^\/user\/login$', ['controller'=>'Clients','action'=>'login']);
Router::add('^\/user\/signup$', ['controller'=>'Clients','action'=>'signup']);
Router::add('^\/user\/account$', ['controller'=>'Clients','action'=>'account']);

//admin
Router::add('^\/admin$', ['controller'=>'Admin','action'=>'index', 'prefix'=>'admin']);
Router::add('^\/admin\/user$', ['controller'=>'Admin','action'=>'user', 'prefix'=>'admin']);
Router::add('^\/admin\/table$', ['controller'=>'Admin','action'=>'table', 'prefix'=>'admin']);
Router::add('^\/admin\/login$', ['controller'=>'Admin','action'=>'login', 'prefix'=>'admin']);
Router::add('^\/admin\/logout$', ['controller'=>'Admin','action'=>'logout', 'prefix'=>'admin']);
Router::add('^\/admin\/signup$', ['controller'=>'Admin','action'=>'signup', 'prefix'=>'admin']);


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
UserModel::addFaker();*/

