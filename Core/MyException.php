<?php

namespace Core;

use App\Models\DataBaseModel;

/**
 * Class MyException
 * @package Core
 */
class MyException
{
    /**
     * MyException constructor.
     */
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        $this->register();
    }

    /**
     * @return void
     */
    public function register(): void
    {
        set_exception_handler([$this, 'exceptionHandler']);
    }

    private function writeLog($message = '', $file = '', $line = null): void
    {
        error_log("[" . date('Y-m-d H:i:s') . "]
                Error: {$message} | File: {$file} | Line: {$line}\n===================\n",
            3, ROOT . "/var/log/errors.log");
    }

    /**
     * @param $myException
     * @return void
     */
    public function exceptionHandler($myException): void
    {
        $this->writeLog($myException->getMessage(), $myException->getFile(), $myException->getLine());
        $this->displayError("Exception", $myException->getMessage(),
            $myException->getFile(), $myException->getLine(), $myException->getCode());
    }

    /**
     * @param $errNo
     * @param $errStr
     * @param $errFile
     * @param $errLine
     * @param int $responce
     * @return void
     */
    protected function displayError($errNo, $errStr, $errFile, $errLine, $responce = 404): void
    {
        http_response_code($responce);

        if ($responce == 404 && !DEBUG) {
            require RESOURCES . '/errors/404.php';
            die();
        }

        /*if (DEBUG) {
            require RESOURCES . '/errors/prod.php';
        }*/

        if (DEBUG) {
            require RESOURCES . '/errors/dev.php';
        }
    }
}