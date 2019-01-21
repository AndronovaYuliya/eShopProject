<?php

namespace Core;

use Exception;
use App\Models\DataBaseModel;

/**
 * Class MyException
 * @package Core
 */
class MyException extends Exception
{
    private $type = 0;

    //errors
    const E_USER_NONE = 0;
    const E_USER_FILE = 1;
    const E_USER_ = 2;

    /**
     * MyException constructor.
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message = '', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->register();
        $this->getType();
    }

    /**
     * @return string
     * Переопределим строковое представление объекта
     */
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    /**
     * @return void
     */
    public function exception_error_handler(): void
    {
        $this->writeLog();
        header('Location: /');
    }

    /**
     * @throws MyException
     */
    public function exception_error_file()
    {
        $this->writeLog();
        $filename = ProductModel::getFileName();
        return DataBaseModel::query($filename);
    }

    /**
     * @return void
     */
    public function register(): void
    {
        set_error_handler([$this, 'exception_error_handler']);
        set_exception_handler([$this, 'exception_handler']);

    }

    /**
     * @return void
     */
    private function writeLog(): void
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

    /**
     * @return void
     */
    private function getType(): void
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