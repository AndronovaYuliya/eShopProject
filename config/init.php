<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/App');
define("CORE", ROOT . '/CORE');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("RESOURCES", ROOT . '/resources');
define("LAYOUT", 'default');
define("PATH", "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}");
define("ADMIN", PATH . '/admin');
define("DB", ROOT. '/database');
