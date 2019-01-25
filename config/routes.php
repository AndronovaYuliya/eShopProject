<?php

use Core\Router;

//default routes
Router::add('^$', ['controller'=>'Main','action'=>'index']);
Router::add('category\/?([a-z0-9-]+)?$', ['controller' => 'Category', 'action' => 'category']);
