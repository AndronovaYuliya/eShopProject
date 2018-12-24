<?php

namespace Components\Sender\Src;

//require 'template/Templater.php';

//use Components\Sender\Src\Transport\TransportSwiftMailer;
//use Components\Sender\Src\Template\Templater;


use Components\Sender\Src\Template\Templater;
use Components\Sender\Src\Transport\TransportSwiftMailer;

class Sender
{
    public static function sendMsg()
    {
        //config + type of sender
        $config=require(dirname(__DIR__).'/config.php');

        //name of senderTransport (TransportSwiftMailer)
        $nameTransport=key($config);

        //Components\Sender\Src\Transport\TransportSwiftMailer
        $pathSenderTransport='Components\Sender\Src\Transport\\'.$nameTransport;

        //object(Swift_Mailer)
        $sender=$pathSenderTransport::createTransport($config[$nameTransport]);

        //body of letter
        $template=Templater::template();

        //prepare
        $message=$pathSenderTransport::sendMsg($template);

        //send
        $result=$sender->send($message);

    }
}