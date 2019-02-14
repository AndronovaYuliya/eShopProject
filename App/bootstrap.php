<?php

require dirname(__FILE__, 2) . '/vendor/autoload.php';
require dirname(__FILE__, 2) . '/config/init.php';
require dirname(__FILE__, 2) . '/config/routes.php';

use App\Models\AppModel;

new AppModel();
