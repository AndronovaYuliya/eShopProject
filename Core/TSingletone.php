<?php

namespace Core;

/**
 * Trait TSingletone
 * @package Core
 */
trait TSingletone
{
    protected static $_instance; //The single instance

    /**
     * @return TSingletone
     */
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}