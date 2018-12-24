<?php

namespace Components\Controllers;

class SenderController
{
    public function letter()
    {
        require dirname(__FILE__,2).'/Sender/index.php';
    }
}