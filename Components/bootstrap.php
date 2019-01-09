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

$log=new CostumLogger();
Router::routing();

//$log->warning('Costum warning');



//phpinfo();

$db = Database::getInstance();


$mysqli = $db->getConnection();


$qr = $db->createTables();

ClientsModel::addClients();
AttributesModel::addAttributes();
ImagesModel::addImages();
CategoriesModel::addCategories();
AttributesValuesModel::addAttributesValues();
ProductsModel::addProducts();
OrdersModel::addOrders();
AdditionalsModel::addAdditionals();
CategoriesAttributesModel::addCategoriesAttributes();
CommentsModel::addComments();
ProductsImagesModel::addProductsImages();



//$attributesModel=new AttributesModel();
//$attributesModel->getAttributes();
//$attributesModel->getAttributeWhere('id',1);