<?php

namespace Inaba;

class MemcacheSetter
{
    /**
     * Setter.
     *
     * @param  string  $key
     * @param  mixed  $val
     * @return mixed
     */
    public static function set(string $key, $val)
    {
        if (extension_loaded('memcache')) {
            $m = new Memcache();
            $m->addServer('localhost');

            $m->set($key, $val);
        }

        if (extension_loaded('memcached')) {
            $md = new Memcached();
            if (empty($md->getServerList())) {
                $md->addServer('localhost', 11211);
            }

            $m->set($key, $val);
        }

        return $val;
    }
}
