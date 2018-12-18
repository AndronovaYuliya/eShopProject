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

        //
        try {
           if(!file_exists($this->homePath.'/'.$this->direct.'s/'.$classname.$this->fileExtension))throw new MyException("File not found", 01);
           include $this->homePath.'/'.$this->direct.'s/'.$classname.$this->fileExtension;
        } catch (MyException $myException) {
            $myException->exception_error_handler();
        }
    }

}