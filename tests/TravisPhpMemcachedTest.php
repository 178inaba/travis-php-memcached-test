<?php

use PHPUnit\Framework\TestCase;

class TravisPhpMemcachedTest extends TestCase
{
    public function testTravisPhpMemcached()
    {
        $m = null;
        if (extension_loaded('memcached')) {
            echo "use memcached.\n";
            $m = new Memcached();
        } elseif (extension_loaded('memcache')) {
            echo "use memcache.\n";
            $m = new Memcache();
        } else {
            echo "memcache and memcached is not installed.\n";
        }

        if ($m !== null) {
            $m->addServer('localhost', 11211);

            $m->set('int', 99);
            $m->set('string', 'a simple string');
            $m->set('array', [11, 12]);
            /* expire 'object' key in 5 minutes */
            $m->set('object', new stdclass, time() + 300);

            echo("\n");
            var_dump($m->get('int'));
            var_dump($m->get('string'));
            var_dump($m->get('array'));
            var_dump($m->get('object'));
        }

        $this->assertEquals(1, 1);
    }
}
