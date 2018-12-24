<?php

namespace Components\Sender\Src;

use Components\Sender\Src\Template\Templater;
use Components\Sender\Src\Transport\TransportSwiftMailer;
use Swift_TransportException;

class Sender
{
    public static function sendMsg()
    {
        //config + type of sender
        $config=require(dirname(__DIR__).'/config.php');

       /*
        * array (size=1)
              'TransportSwiftMailer' =>
                array (size=6)
                  'host' => string 'smtp.gmail.com' (length=14)
                  'port' => int 587
                  'email' => string 'andron39933993@gmail.com' (length=24)
                  'name' => string 'Andronova Yuliya' (length=16)
                  'pass' => string '' (length=11)
                  'encryption' => string 'tls' (length=3)

        *
        * */

        //name of senderTransport (string"TransportSwiftMailer")
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

        try{
            $sender->send($message);
        }
        catch (Swift_TransportException $swift_TransportException){
           var_dump($swift_TransportException);
        }

    }
}