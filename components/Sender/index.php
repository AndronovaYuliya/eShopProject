<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//use app\transport\TransportSwiftMailer;

require 'vendor/autoload.php';
require 'config.php';
require './src/transport/TransportSwiftMailer.php';
require './src/Sender.php';

$transport=new \app\transport\TransportSwiftMailer();


$sender=new \app\Sender($transport);

$user=[
    'name' => 'Ivan Ivanovich',
    'email' => 'andron39933993@gmail.com'
];

$sender->sendMsg('Authorization', $user);