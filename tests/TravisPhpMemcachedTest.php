<?php

use PHPUnit\Framework\TestCase;

class TravisPhpMemcachedTest extends TestCase
{
    /**
     * @group none
     */
    public function testNoMemcache()
    {
    }

    /**
     * @group memcache
     */
    public function testMemcache()
    {
        $existExt = extension_loaded('memcache');
        $this->assertTrue($existExt);

        $m = null;
        if ($existExt) {
            echo "use memcache.\n";
            $m = new Memcache();
        }
    }

    /**
     * @group memcached
     */
    public function testMemcached()
    {
        $existExt = extension_loaded('memcached');
        $this->assertTrue($existExt);

        $m = null;
        if ($existExt) {
            echo "use memcached.\n";
            $m = new Memcached();
        }
    }
}
