<?php

namespace app\transport;

use Swift_SmtpTransport;

class TransportSwiftMailer
{
    private $host;
    private $port;
    private $email;
    private $name;
    private $pass;
    private $encryption;

    public function __construct()
    {
        $config=require(dirname(__DIR__,2).'/config.php');
        $this->host=$config['host'];
        $this->port=$config['port'];
        $this->email=$config['email'];
        $this->name=$config['name'];
        $this->pass=$config['pass'];
        $this->encryption=$config['encryption'];
    }

    public function sendMsg($subject, $message, $recipient)
    {
        $transport=(new Swift_SmtpTransport($this->host, $this->port))
            ->setUsername($this->email)
            ->setPassword($this->pass)
            ->setEncryption($this->encryption)
        ;
        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message($subject))
            ->setFrom([$this->email => $this->name])
            ->setTo([$recipient])
            ->setBody($message)
        ;

        $mailer->send($message);
    }


}



