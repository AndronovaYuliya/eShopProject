<?php

namespace Components;

//2 version
class Autoloader
{
    protected $prefixes=[];

    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    public function loadClass($class)
    {
        $prefix = $class;

        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);

            $relative_class = substr($class, $pos + 1);

            $mapped_file = $this->loadMappedFile($prefix, $relative_class);
            if ($mapped_file) {
                return $mapped_file;
            }
            $prefix = rtrim($prefix, '\\');
        }
        return false;
    }

    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
        //название метода
        $prefix = trim($prefix, '\\') . '.php';

        //название диррректории
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';
        $set=false;
        if (false===$set=isset($this->prefixes[$prefix])) {
            $this->prefixes[$prefix] = [];
            $set=true;
        }

        if ($prepend) {
            array_unshift($this->prefixes[$prefix], $base_dir);
        }
        elseif($set) {
            array_push($this->prefixes[$prefix], $base_dir);
        }
    }

    protected function loadMappedFile($relative_class,$prefix)
    {
        if (isset($this->prefixes[$prefix.'.php']) === false) {
            return false;
        }

        foreach ($this->prefixes[$prefix.'.php'] as $base_dir) {
            $file = str_replace('\\', '/', $relative_class)
                . $prefix.'.php';
        if ($this->requireFile($file)) {
                return $file;
            }
        }
        return false;
    }

    protected function requireFile($file)
    {
        $file=dirname(__FILE__,2).'/'.$file;
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }
}

//1 version
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