<?php
ini_set('display_errors', 1);
require 'components/Autoloader.php';
$autoloader=new Autoloader();

//получаем урл
//header("HTTP/1.1 301 Moved Permanently");
//header($_SERVER['REQUEST_URI']);
Router::routing();
