<?php

namespace Components\Sender\Src\Transport;

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class TransportSwiftMailer
{
    private static $config;

    public static function createTransport($config)
    {
        self::$config=$config;
        $transport=(new Swift_SmtpTransport($config['host'], $config['port']))
            ->setUsername($config['email'])
            ->setPassword($config['pass'])
            ->setEncryption($config['encryption'])
        ;

        return new Swift_Mailer($transport);
    }

    public static function sendMsg($template)
    {
        end($_POST );
        $subject =key($_POST);

        $message =(new Swift_Message($subject))
            ->setFrom([$_POST['email']=> $_POST['name']])
            ->setTo([self::$config['email'] => self::$config['name']])
            ->setBody($template,'text/html');

        return $message;
    }


}



