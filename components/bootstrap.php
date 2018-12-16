<?php

require 'core/router.php';
require 'core/view.php';
require 'core/controller.php';

require 'components/Autoloader.php';

$autoloader=new Autoloader();
router::routing();