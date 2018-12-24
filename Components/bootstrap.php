<?php

require 'Autoloader.php';

use Components\Autoloader;
use Components\Core\Router;

$autoloader=new Autoloader();

$autoloader->register();

$autoloader->addNamespace('Router','/eShopProject/Components/Core/');
$autoloader->addNamespace('Controller','/eShopProject/Components/Core/');
$autoloader->addNamespace('MyException','/eShopProject/Components/Core/');
$autoloader->addNamespace('View','/eShopProject/Components/Core/');

$autoloader->addNamespace('CartController','/eShopProject/Components/Controllers/');
$autoloader->addNamespace('MainController','/eShopProject/Components/Controllers/');
$autoloader->addNamespace('ProductController','/eShopProject/Components/Controllers/');
$autoloader->addNamespace('SenderController','/eShopProject/Components/Controllers/');

$autoloader->addNamespace('DataBaseModel','/eShopProject/Components/Models/');
$autoloader->addNamespace('ProductModel','/eShopProject/Components/Models/');

$autoloader->addNamespace('TransportSwiftMailer','/eShopProject/Components/Sender/Src/Transport/');
$autoloader->addNamespace('TransportInterface','/eShopProject/Components/Sender/Src/Transport/');
$autoloader->addNamespace('Templater','/eShopProject/Components/Sender/Src/Template/');
$autoloader->addNamespace('Sender','/eShopProject/Components/Sender/Src/');

Router::routing();

//$senser=new Sender();

//$exception=new MyException();
//Router::routing();