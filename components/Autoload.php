<?php
//define('ROOT', dirname(__FILE__));
function classAutoload($classname){
    $filename=dirname(__FILE__,2).'/models/'.$classname.'.php';
    include $filename;
}
/*function includesAutoload($includes){
    $filename=dirname(__FILE__,2).'/resources/views/includes/'.includes.'.php';
    include $filename;
}*/
spl_autoload_register('classAutoload');