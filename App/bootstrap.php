<?php

require dirname(__FILE__, 2) . '/vendor/autoload.php';
require dirname(__FILE__, 2) . '/config/init.php';
require dirname(__FILE__, 2) . '/config/routes.php';

use Core\App;

new App();

//throw new Exception('test', 400);



















/*$log = new CostumLogger();
$cache = new Cache();


//Router::add('^$', ['controller'=>'Main','action'=>'index']);

Router::add('^\/product(\/index)?$', ['controller' => 'Product', 'action' => 'index']);
Router::add('^\/product\/show\?[a-z0-9-]+$', ['controller' => 'Product', 'action' => 'show']);
Router::add('^\/product\/brand\?[a-z0-9-]+$', ['controller' => 'Product', 'action' => 'brand']);
Router::add('^\/product\/category\?[a-z0-9-]+$', ['controller' => 'Product', 'action' => 'category']);
Router::add('^\/product\/key\?[a-z0-9-]+$', ['controller' => 'Product', 'action' => 'key']);
Router::add('^\/product\/search$', ['controller' => 'Product', 'action' => 'search']);
Router::add('^\/product\/brand', ['controller' => 'Product', 'action' => 'brand']);
Router::add('^\/sender\/letter$', ['controller' => 'Sender', 'action' => 'letter']);
Router::add('^\/cart(\/index)?$', ['controller' => 'Cart', 'action' => 'index']);
Router::add('^\/cart(\/show)?$', ['controller' => 'Cart', 'action' => 'show']);
Router::add('^\/user\/login$', ['controller' => 'Clients', 'action' => 'login']);
Router::add('^\/user\/signup$', ['controller' => 'Clients', 'action' => 'signup']);
Router::add('^\/user\/account$', ['controller' => 'Clients', 'action' => 'account']);

//admin
Router::add('^\/admin\/user$', ['controller' => 'Admin', 'action' => 'user', 'prefix' => 'admin']);
Router::add('^\/admin\/index$', ['controller' => 'Admin', 'action' => 'user', 'prefix' => 'admin']);
Router::add('^\/admin\/edit$', ['controller' => 'Admin', 'action' => 'edit', 'prefix' => 'admin']);
Router::add('^\/admin\/table$', ['controller' => 'Admin', 'action' => 'table', 'prefix' => 'admin']);
Router::add('^\/admin\/login$', ['controller' => 'Admin', 'action' => 'login', 'prefix' => 'admin']);
Router::add('^\/admin\/delete', ['controller' => 'Admin', 'action' => 'delete', 'prefix' => 'admin']);
Router::add('^\/admin\/logout$', ['controller' => 'Admin', 'action' => 'logout', 'prefix' => 'admin']);
Router::add('^\/admin\/signup$', ['controller' => 'Admin', 'action' => 'signup', 'prefix' => 'admin']);
Router::add('^\/admin$', ['controller' => 'Admin', 'action' => 'user', 'prefix' => 'admin']);

