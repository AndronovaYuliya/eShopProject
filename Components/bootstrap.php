<?php

require dirname(__FILE__,2). '/vendor/autoload.php';

use CostumLogger\CostumLogger;
use Components\Core\Router;
use Components\Core\Database;
use Components\Core\FakerData;
use Components\Mappers\ClientsMapper;
use Components\Mappers\AdditionalsMapper;
use Components\Mappers\AttributesMapper;
use Components\Mappers\ImagesMapper;
use Components\Mappers\KeyWordsMapper;

$log=new CostumLogger();
Router::routing();

//$log->warning('Costum warning');

$db = Database::getInstance();


$mysqli = $db->getConnection();


$qr = $db->createTables();

//ClientsMapper::addClients();
//AdditionalsMapper::addAdditionals();
//AttributesMapper::addAttributes();
//ImagesMapper::addImages();
//KeyWordsMapper::addKeyWords();