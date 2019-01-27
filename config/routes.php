<?php

use Core\Router;

//default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('category\/?([a-z0-9-]+)?$', ['controller' => 'Category', 'action' => 'category']);
Router::add('brand\/?([a-z0-9-]+)?$', ['controller' => 'Brand', 'action' => 'brand']);
Router::add('shop\/?$', ['controller' => 'Shop', 'action' => 'shop']);
Router::add('show\/?([a-z0-9-]+)?$', ['controller' => 'Product', 'action' => 'show']);
Router::add('cart\/?$', ['controller' => 'Cart', 'action' => 'cart']);
Router::add('sender\/letter$', ['controller' => 'Sender', 'action' => 'letter']);
Router::add('search$', ['controller' => 'Shop', 'action' => 'search']);
Router::add('contact$', ['controller' => 'Contact', 'action' => 'contact']);

//admin
Router::add('admin$', ['controller' => 'Admin', 'action' => 'user', 'prefix' => 'admin']);
