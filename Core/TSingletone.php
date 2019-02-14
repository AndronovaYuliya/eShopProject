<?php

namespace Core;

/**
 * Trait TSingletone
 * @package Core
 */
trait TSingletone
{
    protected static $instance; //The single instance

    /**
     * @return TSingletone
     */
    public static function getInstance()
    {
        if (!self::$instance) { // If no instance then make one
            self::$instance = new self();
        }
        return self::$instance;
    }
}