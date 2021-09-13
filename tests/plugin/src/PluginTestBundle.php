<?php

namespace Braunstetter\TestPluginBundle;

use Braunstetter\PluginBundle\Contracts\PluginInterface;
use Braunstetter\PluginBundle\Test\plugin\src\DependencyInjection\PluginTestBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PluginTestBundle extends Bundle implements PluginInterface
{
    public function getContainerExtension(): PluginTestBundleExtension
    {
        if (null === $this->extension) {
            $this->extension = new PluginTestBundleExtension();
        }

        return $this->extension;
    }
}