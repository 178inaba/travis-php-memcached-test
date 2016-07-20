<?php

use PHPUnit\Framework\TestCase;

class TravisPhpMemcachedTest extends TestCase
{
    public function testNoMemcache()
    {
    }

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
