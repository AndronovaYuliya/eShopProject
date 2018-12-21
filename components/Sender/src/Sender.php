<?php
namespace app;

require 'template/Templater.php';

use app\transport\TransportInterface;
use app\template\Templater;
use app\transport\TransportSwiftMailer;

class Sender
{
    private $sender;
    private $dir='';

    public function __construct(TransportSwiftMailer $transportInterface)
    {
        $this->sender=$transportInterface;
    }

    public function sendMsg($event, $user)
    {
        $data=[];
        foreach ($user as $key=>$value)
        {
            $data[$key]=$value;
        }

        //Letter

        $msg=Templater::out('/view/body.php',$user);

        $subject=$event;
        return $this->sender->sendMsg($subject, $msg, $data);
    }
}