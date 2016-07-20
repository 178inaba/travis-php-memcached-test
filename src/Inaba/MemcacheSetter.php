<?php

namespace Inaba;

class MemcacheSetter
{
    /**
     * Setter.
     * Key is 'val'.
     *
     * @param  mixed  $val
     * @return mixed
     */
    public function set($val)
    {
        if (extension_loaded('memcache')) {
            $m = new Memcache();
            $m->addServer('localhost');

            $m->set('val', $val);
        }

        if (extension_loaded('memcached')) {
            $md = new Memcached();
            if (empty($md->getServerList())) {
                $md->addServer('localhost', 11211);
            }

            $m->set('val', $val);
        }

        return $val;
    }
}
