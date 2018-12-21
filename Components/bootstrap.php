<?php

require 'Autoloader.php';

use Components\Autoloader;
use Components\Core\Router;

$autoloader=new Autoloader();
$autoloader->register();
$autoloader->addNamespace('Components','/Components/');
$autoloader->addNamespace('Core','/Core/');
$autoloader->addNamespace('Models','/Models/');

Router::routing();

//$senser=new Sender();

//$exception=new MyException();
//Router::routing();