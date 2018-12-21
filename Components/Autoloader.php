<?php

namespace Components;

class Autoloader
{
    protected $prefixes=[];

    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
        $prefix = trim($prefix, '\\') . '\\';
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';

        if (!isset($this->prefixes[$prefix])){
            $this->prefixes[$prefix]=[];
        }

        if ($prepend) {
            echo 5;
        } else {
            array_push($this->prefixes[$prefix], $base_dir);
        }
    }

    public function loadClass($classname)
    {
        $prefix=$classname;

        while (false!==$pos=strrpos($prefix,'\\')) {
            //"path"
            $prefix=substr($classname, 0, $pos+1);

            //file
            $relative_class=substr($classname, $pos+1);

            //try to load
            $mapped_file=$this->loadMappedFile($prefix, $relative_class);

            if ($mapped_file){
                return $mapped_file;
            }

            //next check
            $prefix=rtrim($prefix, '\\');
        }

        // never found a mapped file
        return false;
    }

    protected function loadMappedFile($prefix, $relative_class)
    {
        if (!isset($this->prefixes[$prefix])) {
            return false;
        }

        foreach ($this->prefixes[$prefix] as $base_dir) {

            $file = $base_dir . str_replace('\\','/', $relative_class) . 'php';

            if ($this->requireFile($file)) {
                return $file;
            }
        }
        // never found it
        return false;
    }

    protected function requireFile($file)
    {
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }
}


/*class Autoloader
{
    private $fileExtension='.php';
    private $homePath;
    private $_needle=['Models','Controllers', 'router'];
    private $direct;


    public function __construct($homePath='/')
    {
        if($homePath=='/'){
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
        include $this->homePath.'/'.$this->direct.'/'.$classname.$this->fileExtension;
    }

}*/