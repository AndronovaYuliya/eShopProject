<?php

namespace Core;

class Cache
{
    public function __construct()
    {

    }

    public function set($key, $data, $seconds = 3600): bool
    {
        $path = dirname(__FILE__, 2) . '/tmp/cache/';
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        if (file_put_contents($path . $key . '.txt', serialize($content))) {
            return true;
        }
        return false;
    }

    public function get($key)
    {
        $file = dirname(__FILE__, 2) . '/tmp/cache/' . $key . '.txt';
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']) {
                return $content['data'];
            } else {
                unlink($file);
            }
            return false;
        }
    }

    public function delete($key)
    {
        $file = dirname(__FILE__, 3) . '/tmp/cache/' . $key . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }
}