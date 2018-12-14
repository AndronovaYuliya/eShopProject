<?php

class Autoloader
{
    private $fileExtension='.php';
    private $homePath;
    private $_needle=['model','controller', 'router'];
    private $direct;

    public function __construct($homePath='/')
    {
        if($homePath=='/')
        {
            $this->homePath=dirname(__FILE__,2);
        }
        else {
            $this->homePath=$homePath;
        }
        $this->register();
    }

    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    public function loadClass($classname)
    {
        foreach ($this->_needle as $value)
        {
            if(stristr($classname,$value)){
                $this->direct=$value;
            }
        }
        include $this->homePath.'/'.$this->direct.'s/'.$classname.$this->fileExtension;
    }

}