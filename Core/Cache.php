<?php

namespace Core;

/**
 * Class Cache
 * @package Core
 */
class Cache
{
    use TSingletone;

    /**
     * @param $key
     * @param $data
     * @param int $seconds
     * @return bool
     */
    public function set($key, $data, $seconds = 3600): bool
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        return (file_put_contents(CACHE . '/' . $key . '.txt', serialize($content))) ? true : false;
    }

    /**
     * @param $key
     * @return bool
     */
    public function get($key)
    {
        $file = CACHE . '/' . $key . '.txt';
        if (!file_exists($file)) {
            unlink($file);
            return false;
        }

        $content = unserialize(file_get_contents($file));
        if (time() <= $content['end_time']) {
            return $content['data'];
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
        $file = CACHE . '/' . $key . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }
}
