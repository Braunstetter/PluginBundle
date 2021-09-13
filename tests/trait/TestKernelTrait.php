<?php

namespace Braunstetter\PluginBundle\Test\trait;

use Braunstetter\PluginBundle\Test\app\src\TestKernel;

trait TestKernelTrait
{

    protected Testkernel $kernel;

    protected function setUp(): void
    {
        parent::setUp();

        $kernel = new TestKernel('dev', true);
        $kernel->boot();

        $this->kernel = $kernel;
    }

}