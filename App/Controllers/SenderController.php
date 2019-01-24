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
     * @return void
     */
    public function letterAction(): void
    {
        Sender::sendMsg();
        header('Location: /');
    }
}