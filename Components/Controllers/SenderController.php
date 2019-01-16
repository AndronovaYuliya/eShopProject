<?php

namespace Components\Controllers;

use Sender\Sender;

class SenderController
{
    public function letterAction()
    {
        Sender::sendMsg();
        header('Location: /');
    }
}