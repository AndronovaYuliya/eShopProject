<?php

namespace Components\Controllers;


use Sender\Sender;

class SenderController
{
    public function letter()
    {
        Sender::sendMsg();
        header('Location: /');
    }
}