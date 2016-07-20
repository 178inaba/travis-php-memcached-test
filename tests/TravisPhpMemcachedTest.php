<?php

use PHPUnit\Framework\TestCase;
use Inaba\MemcacheSetter;

class TravisPhpMemcachedTest extends TestCase
{
    /**
     * @group none
     */
    public function testNone()
    {
        $key = 'val';
        $val = 'none';
        $ret = MemcacheSetter::set($key, $val);

        $this->assertSame($val, $ret);
    }

    /**
     * @group memcache
     */
    public function testMemcache()
    {
        $key = 'val';
        $val = 'memcache';
        $ret = MemcacheSetter::set($key, $val);
        $cache = (new Memcache)->get($key);

        $this->assertSame($val, $ret);
        $this->assertSame($val, $cache);
    }

    /**
     * @group memcached
     */
    public function testMemcached()
    {
        $key = 'val';
        $val = 'memcached';
        $ret = MemcacheSetter::set($key, $val);
        $md = new Memcached(MemcacheSetter::PERSISTENT_ID);
        $cache = $md->get($key);

        $this->assertSame($val, $ret);
        $this->assertSame($val, $cache);
    }
}
