<?php

namespace Core;

/**
 * Class Cache
 * @package Core
 */
class Cache
{
    /**
     * @param $key
     * @param $data
     * @param int $seconds
     * @return bool
     */
    public function set($key, $data, $seconds = 3600): bool
    {
        $path = dirname(__FILE__, 2) . '/tmp/cache/';
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;

        return (file_put_contents($path . $key . '.txt', serialize($content))) ? true : false;
    }

    /**
     * @param $key
     * @return bool
     */
    public function get($key): bool
    {
        $file = dirname(__FILE__, 2) . '/tmp/cache/' . $key . '.txt';
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
        }
        unlink($file);
        return false;
    }

    /**
     * @param $key
     * @return void
     */
    public function delete($key): void
    {
        $file = dirname(__FILE__, 3) . '/tmp/cache/' . $key . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }
}