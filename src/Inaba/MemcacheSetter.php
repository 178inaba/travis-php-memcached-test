<?php

namespace Inaba;

use Memcache;
use Memcached;

class MemcacheSetter
{
    const PERSISTENT_ID = __NAMESPACE__.__CLASS__;

    /**
     * Setter.
     *
     * @param  string  $key
     * @param  mixed  $val
     * @return mixed
     */
    public static function set($key, $val)
    {
        if (extension_loaded('memcache')) {
            $m = new Memcache;
            $m->addServer('localhost');

            $m->set($key, $val);
        }

        if (extension_loaded('memcached')) {
            $md = new Memcached(self::PERSISTENT_ID);
            if (empty($md->getServerList())) {
                $md->addServer('localhost', 11211);
            }

            $md->set($key, $val);
        }

        return $val;
    }
}
