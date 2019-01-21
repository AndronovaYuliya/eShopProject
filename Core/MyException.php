<?php

namespace Core;

use Exception;
use App\Models\DataBaseModel;

class MyException extends Exception
{
    private $type = 0;

    //errors
    const E_USER_NONE = 0;
    const E_USER_FILE = 1;
    const E_USER_ = 2;

    /**
     * @param $message = ''
     * @param $code = 0
     * @param Exception $previous = null
     */
    public function __construct($message = '', $code = 0, Exception $previous = null)
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
        $filename = ProductModel::getFileName();
        return DataBaseModel::query($filename);
    }

    public function register()
    {
        set_error_handler([$this, 'exception_error_handler']);
        set_exception_handler([$this, 'exception_handler']);

    }

    private function writeLog()
    {
        $file = fopen(dirname(__FILE__, 2) . '/var/log/php_errors.log', 'a');
        if (!empty($file)) {
            $err = $this->getMessage() . "\n";
            $err .= "type: " . $this->type . "\tLine: " . $this->getLine() . "\n";
            $err .= "date: " . date('Y-m-d H:i:s') . "\n";
            $err .= $this->getTraceAsString();
            $err .= "\n\n";
            fwrite($file, $err);
            fclose($file);
        }
    }

    private function getType()
    {
        switch ($this->code) {
            case 01:
                $this->type = 'E_USER_CLASS';
                break;
            case 2:
                $this->type = 'E_USER_FILE';
            default;
                break;

        }
    }

    /**
     * @param $myException
     */
    public function exception_handler($myException)
    {
        $this->writeLog();
    }
}