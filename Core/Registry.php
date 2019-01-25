<?php

namespace Core;

/**
 * Class Registry
 * @package Core
 */
class Registry
{
    use TSingletone;

    /**
     * @var array
     */
    protected static $properties = [];

    /**
     * @param $name
     * @param $value
     */
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function getProperty($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        } else {
            return null;
        }
    }

    /**
     * @return array
     */
    public function getProperies()
    {
        return self::$properties;
    }


}