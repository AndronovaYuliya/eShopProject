<?php

use Core\Router;

//admin
Router::add('admin\/login$', ['controller' => 'AdminMain', 'action' => 'login', 'prefix' => 'admin']);
Router::add('admin\/logout$', ['controller' => 'AdminMain', 'action' => 'logout', 'prefix' => 'admin']);
Router::add('admin\/signup$', ['controller' => 'AdminMain', 'action' => 'signup', 'prefix' => 'admin']);
Router::add('admin\/edit$', ['controller' => 'AdminMain', 'action' => 'edit', 'prefix' => 'admin']);
Router::add('admin\/delete$', ['controller' => 'AdminMain', 'action' => 'delete', 'prefix' => 'admin']);
Router::add('admin\/tableDelete$', ['controller' => 'AdminMain', 'action' => 'tableDelete', 'prefix' => 'admin']);
Router::add('admin\/tableAdd$', ['controller' => 'AdminMain', 'action' => 'tableAdd', 'prefix' => 'admin']);
Router::add('admin\/tableEdit$', ['controller' => 'AdminMain', 'action' => 'tableEdit', 'prefix' => 'admin']);
Router::add('admin$', ['controller' => 'AdminMain', 'action' => 'index', 'prefix' => 'admin']);
Router::add('admin\/faker$', ['controller' => 'Faker', 'action' => 'addData']);

//default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('category\/?([a-z0-9-]+)?$', ['controller' => 'Category', 'action' => 'category']);
Router::add('brand\/?([a-z0-9-]+)?$', ['controller' => 'Brand', 'action' => 'brand']);
Router::add('shop\/?$', ['controller' => 'Shop', 'action' => 'shop']);
Router::add('show\/?([a-z0-9-]+)?$', ['controller' => 'Product', 'action' => 'show']);
Router::add('cart\/add$', ['controller' => 'Cart', 'action' => 'add']);
Router::add('cart\/getQtyTotal', ['controller' => 'Cart', 'action' => 'getQtyTotal']);
Router::add('cart\/getTotal', ['controller' => 'Cart', 'action' => 'getTotal']);
Router::add('cart\/clear', ['controller' => 'Cart', 'action' => 'clear']);
Router::add('cart\/?$', ['controller' => 'Cart', 'action' => 'cart']);
Router::add('key\?([a-z0-9-]+)?$', ['controller' => 'Product', 'action' => 'key']);
Router::add('sender\/letter$', ['controller' => 'Sender', 'action' => 'letter']);
Router::add('search$', ['controller' => 'Shop', 'action' => 'search']);
Router::add('contact$', ['controller' => 'Contact', 'action' => 'contact']);
Router::add('login\/?$', ['controller' => 'Users', 'action' => 'login']);
Router::add('signup\/?$', ['controller' => 'Users', 'action' => 'signup']);
Router::add('logout\/?$', ['controller' => 'Users', 'action' => 'logout']);
Router::add('account\/?$', ['controller' => 'Account', 'action' => 'account']);

