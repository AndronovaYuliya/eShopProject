<?php

namespace app\transport;

interface TransportInterface
{
    public function sendMsg($subject, $message, $recipientParam);
}