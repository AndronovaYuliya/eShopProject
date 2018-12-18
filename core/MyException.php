<?php

class MyException extends Exception
{
    private $type=0;

    //errors
    const E_USER_NONE = 0;
    const E_USER_FILE = 1;
    const E_USER_ = 2;

   /*
    *
    * protected $message = 'Unknown exception';   // сообщение об исключении
    private   $string;                          // свойство для __toString
    protected $code = 0;                        // пользовательский код исключения
    protected $file;                            // файл, в котором было выброшено исключение
    protected $line;                            // строка, в которой было выброшено исключение
    private   $trace;                           // трассировка вызовов методов и функций
    private   $previous;                        // предыдущее исключение, если исключение вложенное
   */

   /*
    *  final public  function getMessage();        // сообщение исключения
    final public  function getCode();           // код исключения
    final public  function getFile();           // файл, где выброшено исключение
    final public  function getLine();           // строка, на которой выброшено исключение
    final public  function getTrace();          // массив backtrace()
    final public  function getPrevious();       // педыдущее исключение
    final public  function getTraceAsString();  // отформатированная строка трассировки
   */

    public function __construct($message='', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->register();
        $this->getType();
    }

    // Переопределим строковое представление объекта.
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function exception_error_handler()
    {
        $this->writeLog();
        header('Location: /');
    }

    public function exception_error_file()
    {
        $this->writeLog();
        $filename=ProductModel::getFileName();
        return DataBaseModel::getData($filename);
    }

    public function register()
    {
        set_error_handler([$this,'exception_error_handler']);
        set_exception_handler([$this,'exception_handler']   );

    }

    private function writeLog()
    {
        $file = fopen(dirname(__FILE__,2).'/var/log/php_errors.log', 'a');
        if (!empty($file))
        {
            $err=$this->getMessage()."\n";
            $err.="type: ".$this->type."\tLine: ".$this->getLine()."\n";
            $err.="date: ".date('Y-m-d H:i:s')."\n";
            $err.=$this->getTraceAsString();
            $err.="\n\n";
            fwrite($file, $err);
            fclose($file);
        }
    }

    private function getType()
    {
        switch ($this->code)
        {
            case 01:
                $this->type='E_USER_CLASS';
                break;
            case 2:
                $this->type='E_USER_FILE';
            default;
                break;

        }
    }

    function exception_handler($myException) {
        $this->writeLog();
       // header('Location: /');
    }
}