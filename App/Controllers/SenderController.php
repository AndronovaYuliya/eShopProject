<?php

namespace App\Controllers;

use Sender\Sender;
use Core\View;

/**
 * Class SenderController
 * @package App\Controllers
 */
class SenderController extends AppController
{
    /**
     * @throws \Exception
     */
    public function letterAction(): void
    {
        Sender::sendMsg();
        echo json_encode("Sent!");

    }

    /**
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Main", "action" => "index"], 'Site/default', 'index');
        $viewObj->rendor($this->data);
    }
}