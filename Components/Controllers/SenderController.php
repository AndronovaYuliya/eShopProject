<?php

namespace Components\Controllers;


use Sender\Sender;

class SenderController
{
    public function letter()
    {
        Sender::sendMsg();
        echo "<pre>";
        var_dump($_SERVER);
        echo "</pre>";
    }
}