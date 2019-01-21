<?php

namespace App\Controllers;

use Sender\Sender;

/**
 * Class SenderController
 * @package App\Controllers
 */
class SenderController
{
    /**
     *
     */
    public function letterAction()
    {
        Sender::sendMsg();
        header('Location: /');
    }
}