<?php

require dirname(__FILE__,2). '/vendor/autoload.php';

use CostumLogger\CostumLogger;
use Components\Core\Router;

$log=new CostumLogger();
Router::routing();
$log->warning('Costum warning');
