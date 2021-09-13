<?php

namespace Braunstetter\PluginBundle\Test\functional;

use Braunstetter\PluginBundle\Services\Plugins;
use Braunstetter\PluginBundle\Test\trait\TestKernelTrait;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    use TestKernelTrait;

    public function test_test_works()
    {

        $plugins = $this->kernel->getContainer()->get(Plugins::class);


        dump($plugins);
        $this->assertTrue(TRUE);
    }
}
