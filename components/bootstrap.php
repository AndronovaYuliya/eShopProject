<?php

require 'core/router.php';
require 'core/view.php';
require 'core/controller.php';
require 'core/MyException.php';
require 'components/Autoloader.php';
/*ini_set('log_errors', 'On');
ini_set('error_log', 'var/log/php_errors.log');*/

$autoloader=new Autoloader();

//$exception=new MyException();
router::routing();